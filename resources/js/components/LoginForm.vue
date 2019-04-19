<template>
    <form @submit.prevent="login" @keydown="form.onKeydown($event)">
<!--        <a class="btn btn-social btn-facebook btn-block btn-icon-left" href="" role="button"><i class="fa fa-facebook"></i> Connect with Facebook</a>-->
<!--        <div class="divider">-->
<!--            <span>or</span>-->
<!--        </div>-->
        <div class="form-group input-icon-left m-b-10">
            <i class="fa fa-envelope"></i>
            <input
                    v-model="form.email"
                    :class="{ 'is-invalid': form.errors.has('email') }"
                    type="text"
                    name="email"
                    placeholder="Email Address"
                    class="form-control form-control-secondary">
            <has-error :form="form" field="email"></has-error>
        </div>
        <div class="form-group input-icon-left m-b-15">
            <i class="fa fa-lock"></i>
            <input
                    v-model="form.password"
                    :class="{ 'is-invalid': form.errors.has('password') }"
                    type="password"
                    name="password"
                    placeholder="Password"
                    class="form-control form-control-secondary">
            <has-error :form="form" field="password"></has-error>
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
                })
            }
        },

        computed:{
            isValidForm(){
                return this.validateEmail(this.form.email) && this.form.password ;
            }
        },

        methods: {
            login(){
                if(this.isValidForm){
                    this.form.post('/login')
                        .then(({ data }) => { location.reload();})
                }
            },

            validateEmail(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            },
        }
    }
</script>