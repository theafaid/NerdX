<template>
    <form @submit.prevent="submit" @keydown="form.onKeydown($event)">
        <a class="btn btn-social btn-github" href="/auth/github" role="button"><i class="github"></i></a>
        <a class="btn btn-social btn-facebook" href="/auth/facebook" role="button"><i class="facebook"></i></a>
        <a class="btn btn-social btn-twitter" href="/auth/twitter" role="button"><i class="twitter"></i></a>
        <div class="divider">
            <span>or</span>
        </div>
        <div class="form-group input-icon-left m-b-10">
            <i class="fa fa-envelope"></i>
            <input
                    v-validate="'required|email'"
                    v-model="form.email"
                    :class="{ 'is-invalid': form.errors.has('email') }"
                    type="text"
                    name="email"
                    placeholder="Email Address"
                    class="form-control form-control-secondary">
            <has-error :form="form" field="email"></has-error>
            <span class="text-red">{{ errors.first('email') }}</span>

        </div>
        <div class="form-group input-icon-left m-b-15">
            <i class="fa fa-lock"></i>
            <input
                    v-validate="'required'"
                    v-model="form.password"
                    :class="{ 'is-invalid': form.errors.has('password') }"
                    type="password"
                    name="password"
                    placeholder="Password"
                    class="form-control form-control-secondary">
            <has-error :form="form" field="password"></has-error>
            <span class="text-red">{{ errors.first('password') }}</span>
        </div>
        <label class="custom-control custom-checkbox custom-checkbox-primary">
            <input type="checkbox" class="custom-control-input" v-model="form.remember">
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">Remember me</span>
        </label>
        <button type="submit" class="btn btn-primary btn-block m-t-10">Login <i class="fa fa-sign-in-alt"></i></button>
    </form>
</template>

<script>
    export default {
        name: "LoginForm",

        data(){
            return {
                form: new Form({
                    email: '',
                    password: '',
                    remember: false
                }),
                loading: false,
                alertText: '',
            }
        },

        computed:{
            isValidForm(){
                return this.validateEmail(this.form.email) && this.form.password ;
            }
        },

        methods: {
            submit(){
                if(this.isValidForm){
                    this.loading = true;
                    this.login();
                    this.showLoadingModal();
                }
            },

            login(){
                this.loading = true;
                this.alertText = "Logging ...";

                this.form.post('/login')
                    .then(({ data }) => { location.reload();})
                    .catch(error => {
                        this.loading = false;
                        this.form.password = '';
                    });
            },

            showLoadingModal(){
                if(this.loading){
                    let timerInterval
                    Swal.fire({
                        html: 'Logging ...',
                        timer: 1500,
                        onBeforeOpen: () => {
                            Swal.showLoading();
                        }
                    })
                }
            },

            validateEmail(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            },
        }
    }
</script>