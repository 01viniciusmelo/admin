<template>

    <div class="content">

        <button @click="showModal('create')"
                class="btn btn-primary">
            <i class="icon-plus"></i>
            nuevo Usuario
        </button>

        <hr>

        <table class="table table-bordered table-striped">

            <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Correo Electronico</th>
                <th>Role</th>
                <th>
                    <i class="fa fa-ellipsis-h"></i>
                </th>
            </tr>
            </thead>

            <tbody>
                <tr v-for="(user, index) in users" :key="user.id">
                <td v-text="index + 1"></td>
                <td v-text="user.name"></td>
                <td v-text="user.email"></td>
                <td v-text="user.role"></td>
                <td>
                    <div class="btn-group">
                        <a :href="`/users/${user.id}`" class="btn btn-info btn-md">
                            <i class="fa fa-eye"></i>
                        </a>
                        <button @click="showModal('update', user)"
                                class="btn btn-warning btn-md">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button @click="destroy(user.id)"
                                class="btn btn-danger btn-md">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>

            </tbody>

        </table>

        <div :class="['modal', 'fade', { 'show': modal }]"
             tabindex="-1"
             role="dialog"
             aria-labelledby="myModalLabel"
             style="display: none;"
             aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title"
                            v-text="modalTitle"
                        ></h4>

                        <button @click="closeModal()"
                                class="close"
                                aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>

                    </div>
                    <div class="modal-body">

                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">
                                            <strong class="text-red">*</strong>
                                            Nombre
                                        </label>
                                        <input type="text"
                                               v-model="userData.name"
                                               id="name"
                                               class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="role">
                                            <strong class="text-red">*</strong>
                                            Rol
                                        </label>
                                        <select v-model="userData.role" class="form-control" id="role" required>
                                            <option disabled selected></option>
                                            <option value="user">Usuario Regular</option>
                                            <option value="seller">Vendedor</option>
                                            <option value="admin">Administrador</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">
                                            <strong class="text-red">*</strong>
                                            Correo Electronico
                                        </label>
                                        <input type="email"
                                               v-model="userData.email"
                                               id="email"
                                               class="form-control"
                                               required>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="password">
                                            <strong class="danger">*</strong>
                                            Contrasena
                                        </label>
                                        <input type="password"
                                               v-model="userData.password"
                                               id="password"
                                               class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="password_confirmation">
                                            <strong class="danger">*</strong>
                                            Confirmar Contrasena
                                        </label>
                                        <input type="password"
                                               id="password_confirmation"
                                               v-model="userData.password_confirmation"
                                               class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="avatar">
                                            Avatar
                                        </label>
                                        <input type="text"
                                               id="avatar"
                                               class="form-control">
                                    </div>
                                </div>

                            </div>

                        </form>

                        <div v-if="errors" class="col-md-12">

                            <div class="div-error">
                                <ul>
                                    <li v-for="error in errors" v-text="error" class="pull-left text-red"></li>
                                </ul>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">

                        <button @click="closeModal()"
                                class="btn btn-secondary btn-md">
                            Close
                        </button>
                        <button @click="createOrUpdate(actionType)"
                                class="btn btn-success btn-md"
                                v-text="actionType">
                        </button>

                    </div>
                </div>
            </div>
    </div>

    </div>

</template>

<script>

    export default {

        data() {

            return {

                users: [],
                userId: 0,
                actionType: '',
                userData: [],

                modal: 0,
                modalTitle: '',

                errors: [],

            }

        },
        methods: {

            showModal(action, data = []) {

                this.usersList()

                this.modal = 1

                if (action === 'create') {

                    this.modalTitle = 'Crear Usuario'
                    this.actionType = 'Guardar'
                    this.userData = []

                }

                if (action === 'update') {

                    this.modalTitle = `Actualizar el Usuario: ${data.name}`
                    this.actionType = 'Actualizar'

                    this.userId = data.id
                    this.userData.name = data.name
                    this.userData.email = data.email
                    this.userData.role = data.role
                    this.userData.avatar = data.avatar

                }

            },
            closeModal() {

                this.modal = 0
                this.modalTitle = ''

            },

            createOrUpdate(actionType) {

                if (actionType === 'Guardar') {

                    axios.post('/api/users', {

                        'name': this.userData.name,
                        'email': this.userData.email,
                        'role': this.userData.role,
                        'password': this.userData.password,
                        'password_confirmation': this.userData.password_confirmation,
                        'avatar': this.userData.avatar,

                    })
                        .then( () => {

                            this.closeModal()
                            this.usersList()

                        })
                        .catch(err => {

                            console.log(err)

                            this.errors = err.response.data.errors

                        })

                }

                if (actionType === 'Actualizar') {

                    axios.put(`/api/users/${this.userId}`, {

                        'name': this.userData.name,
                        'email': this.userData.email,
                        'role': this.userData.role,
                        'avatar': this.userData.avatar,

                    })
                    .then( () => {

                        this.closeModal()
                        this.usersList()

                    })
                    .catch(err => {

                        console.log(err)

                    })

                }

            },
            usersList() {

                axios.get('/api/users')
                    .then(res => {

                        this.users = res.data.data.data

                    })
                    .catch(err => {

                        console.log(err)

                    })

            },
            destroy(userId) {

                axios.delete(`/api/users/${userId}`)
                    .then( () => {

                        this.usersList()

                    })
                    .catch(err => {

                        console.log(err)

                    })

            }

        },
        mounted() {

            this.usersList()

        }

    }
</script>

<style scoped>

    .table {

        text-align: center;
        vertical-align: middle;

    }

    .show {

        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;

    }

    .modal-content {

        width: 100% !important;
        position: absolute !important;

    }

    .div-error {

        display: flex;
        justify-content: center;
        width: 100%;

    }

    .text-red {
        color: red;
        font-weight:bold;
    }
</style>