<template>
    <form class="tab-content p-t-20" @submit.prevent="submit" @keydown="form.onKeydown($event)">
        <div class="tab-pane active" id="forum" role="tabpanel">
            <!-- form -->
            <div class="form-group">
                <label>Channel Name</label>
                <input
                        v-validate="'required|max:55'"
                        v-model="form.name"
                        :class="{ 'is-invalid': form.errors.has('name') }"
                        type="text"
                        name="name"
                        placeholder="Enter your channel name"
                        class="form-control">
                <has-error :form="form" field="name"></has-error>
                <span class="text-red">{{ errors.first('name') }}</span>

            </div>
            <div class="form-group">
                <label>Describe your channel</label>
                <textarea
                        v-validate="'max:10000'"
                        v-model="form.description"
                        :class="{ 'is-invalid': form.errors.has('description') }"
                        type="text"
                        name="description"
                        class="form-control"
                        rows="12"
                        ></textarea>
                <has-error :form="form" field="description"></has-error>
                <span class="text-red">{{ errors.first('description') }}</span>
            </div>
        </div>

        <div class="m-t-30">
            <button class="btn btn-primary btn-rounded btn-shadow float-right" type="submit" name="save">Create my channel</button>
        </div>
    </form>
</template>

<script>
    import Fire from '../mixins/fire'

    export default {
        name: "CreateChannel",

        mixins: [Fire],

        data(){
            return {
                form: new Form({
                    name: '',
                    description: '',
                    logo: false
                }),
                loading: false,
                alertText: '',
            }
        },

        computed: {
            isValidForm(){
                return this.form.name;
            }
        },

        methods:{
            submit(){
                this.isValidForm ? this.create() : this.fire('Please fill all fields', 'error');
            },

            create(){
                this.loading = true;
                this.alertText = 'Please wait until we create your new channel';

                this.form.post(route('user.channels.store', App.user.username))
                    .then(({data}) => {
                        this.loading = false;

                        this.successThenRedirect(data.msg, data.redirectUrl);
                    })
                    .catch(erorr => {this.loading = false;});
            },
        }
    }
</script>