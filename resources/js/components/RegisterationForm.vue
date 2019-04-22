<template>
    <form @submit.prevent="submit" @keydown="form.onKeydown($event)">
<!--        <a class="btn btn-social btn-google-plus btn-block btn-icon-left" href="" role="button"><i class="fa fa-google-plus"></i> Register with Google Plus</a>-->
<!--        <div class="divider"><span>or</span></div>-->
        <div class="form-group input-icon-left m-b-10">
            <i class="fa fa-user"></i>
            <input
                    v-validate="'required'"
                    v-model="form.name"
                    :class="{ 'is-invalid': form.errors.has('name') }"
                    type="text"
                    name="name"
                    placeholder="Full name"
                    class="form-control form-control-secondary">
            <has-error :form="form" field="name"></has-error>
            <span class="text-red">{{ errors.first('name') }}</span>

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
        <div class="form-group input-icon-left m-b-10">
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
        <div class="form-group input-icon-left m-b-10">
            <i class="fa fa-unlock"></i>
            <input
                    v-model="form.password_confirmation"
                    :class="{ 'is-invalid': form.errors.has('password_confirmation') }"
                    type="password"
                    name="password_confirmation"
                    placeholder="Repeat Your Password"
                    class="form-control form-control-secondary">
            <has-error :form="form" field="password_confirmation"></has-error>
        </div>

        <button type="submit" class="btn btn-primary m-t-10 btn-block">Complete Registration <i class="fa fa-sign-in-alt"></i></button>
    </form>
</template>

<script>
    import fire from '../mixins/fire'

    export default{
        mixins: [fire],

        data(){
            return {
                form: new Form({
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: ''
                }),
                loading: false,
                alertText: '',
            }
        },

        computed:{
            isValidForm(){
                return this.validateEmail(this.form.email) && this.form.name && this.form.password;
            },

            isValidPassword(){
                return (this.form.password.length) >= 8 && (this.form.password == this.form.password_confirmation);
            },
        },

        methods:{
            submit(){

                if(! this.isValidPassword){
                    this.fire('Password must be at least 8 char and confirmed !', 'error');
                    return;
                }

                if(this.isValidForm){
                    this.loading = true;
                    this.register();
                }
            },

            register(){
                this.alertText = 'Wait until we register you ...';
                this.loading = true;

                this.form.post('/register')
                    .then(({data}) => {
                        this.loading = false;
                        location.reload()
                     })
                    .catch(error => {
                        this.form.password = '';
                        this.form.password_confirmation = '';
                        this.loading = false;
                    });
            },

            validateEmail(email){
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }
        }
    }
</script>