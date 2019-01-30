<template>

    <div class="content">

        <button @click="showModal()"
                class="btn btn-info">
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
                        <button class="btn btn-warning btn-md">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button class="btn btn-danger btn-md">
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
                                            <strong>*</strong>
                                            Nombre
                                        </label>
                                        <input type="text"
                                               id="name"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="role">
                                            <strong>*</strong>
                                            Rol
                                        </label>
                                        <select class="form-control" id="role">
                                            <option disabled selected></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">
                                            <strong>*</strong>
                                            Correo Electronico
                                        </label>
                                        <input type="email"
                                               id="email"
                                               class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="password">
                                            <strong>*</strong>
                                            Contrasena
                                        </label>
                                        <input type="password"
                                               id="password"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="password_confirmation">
                                            <strong>*</strong>
                                            Confirmar Contrasena
                                        </label>
                                        <input type="password"
                                               id="password_confirmation"
                                               class="form-control">
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

                    </div>
                    <div class="modal-footer">

                        <button @click="closeModal()"
                                class="btn btn-secondary btn-md btn-block">
                            Close
                        </button>

                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>

    export default {

        props: ['users'],
        data() {

            return {

                actionType: '',
                userData: [],

                modal: 0,
                modalTitle: ''

            }

        },
        methods: {

            showModal() {

                this.modal = 1
                this.modalTitle = 'Crear Usuario'

            },
            closeModal() {

                this.modal = 0
                this.modalTitle = ''

            },

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

    strong {
        color: red;
    }
</style>