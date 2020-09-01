<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User data</h3>

                <div class="card-tools">
                    <button class="btn btn-primary btn-sm" @click="newModal"><i class="fas fa-user-plus"></i> Add New</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Modified</td>
                                <td>Modify</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in users" v-bind:key="user.id">
                                <td>{{user.id}}</td>
                                <td>{{user.name}}</td>
                                <td>{{user.email}}</td>
                                <td>{{user.updated_at | fdate}}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="mx-1" @click="editModal(user)">
                                            <i class="fas fa-edit text-muted"></i>
                                        </a>
                                        <a href="#" class="mx-1" @click="deleteUser(user.id)">
                                            <i class="fas fa-trash text-muted"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="mdl-new-user">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <form @submit.prevent="edit?EditUser():CreateUser()" @keydown="form.onKeydown($event)">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{edit?`Edit Data`:`Add Data`}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input v-model="form.name" type="text" name="name"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }"
                                placeholder="Name">
                                <has-error :form="form" field="name"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input v-model="form.email" type="email" name="email"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('email') }"
                                placeholder="Email">
                                <has-error :form="form" field="email"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input v-model="form.password" type="password" name="password"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('password') }"
                                placeholder="Password">
                                <has-error :form="form" field="password"></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{edit?`Update`:`Save`}}</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            edit: false,
            users: [],
            form: new Form({
                id: '',
                name: '',
                email: '',
                password: ''
            })
        }
    },
    methods: {
        loadUsers(){
            axios.get('api/user').then(({ data }) => (this.users = data.data))
        },
        newModal(){
            this.edit = false
            this.form.reset()
            $('#mdl-new-user').modal('show')
        },
        editModal(user){
            this.edit = true
            this.form.fill(user)
            $('#mdl-new-user').modal('show')
        },
        CreateUser(){
            this.$Progress.start()
            this.form.post(`api/user`).then(({ data }) => {
                $('#mdl-new-user').modal('hide')
                Toast.fire({
                    icon: 'success',
                    title: 'User wes dadi bro'
                })
                this.loadUsers()
                this.$Progress.finish()
            })
            .catch(() => {
                this.$Progress.fail()
            })
        },
        EditUser(){
            this.$Progress.start()
            this.form.put(`api/user/${this.form.id}`).then(({ data }) => {
                $('#mdl-new-user').modal('hide')
                Toast.fire({
                    icon: 'success',
                    title: 'User wes diupdate bro'
                })
                this.loadUsers()
                this.$Progress.finish()
            })
            .catch(() => {
                this.$Progress.fail()
            })
        },
        deleteUser(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    this.$Progress.start()
                    this.form.delete(`api/user/${id}`).then(({ data }) => {
                        this.loadUsers()
                        Swal.fire(
                            'Deleted!',
                            'User has been deleted.',
                            'success'
                            )
                    })
                    this.$Progress.finish()
                }
            })
        }
    },
    created(){
        this.loadUsers()
    }
}
</script>