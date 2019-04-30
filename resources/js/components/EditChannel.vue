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
                        placeholder="Enter a unique & creative name"
                        class="form-control">
                <has-error :form="form" field="name"></has-error>
                <span class="text-red">{{ errors.first('name') }}</span>
            </div>
            <div class="form-group">
                <label>Channel Url</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" v-text="siteUrl"></label>
                    </div>
                    <input
                            v-validate="'required|max:55'"
                            v-model="form.slug"
                            :class="{ 'is-invalid': form.errors.has('slug') }"
                            type="text"
                            name="slug"
                            placeholder="Enter a unique & creative slug"
                            class="form-control">
                    <has-error :form="form" field="slug"></has-error>
                    <span class="text-red">{{ errors.first('slug') }}</span>
                </div>

            </div>
            <div class="form-group">
                <label>Describe your channel</label>
                <textarea
                        v-validate="'required|max:1000'"
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
            <button v-show="! loading" class="btn btn-primary btn-rounded btn-shadow float-right" type="submit" name="save">Update my channel</button>
        </div>
    </form>
</template>

<script>

    import Fire from '../mixins/fire'

    export default {
        name: "EditChannel",

        props: ['data'],

        mixins: [Fire],

        data(){
            return {
                channel: this.data,
                siteUrl: App.siteUrl + "/",

                form: new Form({
                    name: this.data.name,
                    slug: this.data.slug,
                    description: this.data.description,
                })
            }
        },

        computed: {
            isValidForm(){
                return this.form.name && this.form.slug && this.form.description.length && this.form.description.length < 1000;
            }
        },

        methods: {
            submit(){
                if(! this.isValidForm){
                    this.fire('Please follow the instructions before submit', 'error');
                    return;
                }

                this.update();
            },

            update(){
                this.loading = true;
                this.alertText = 'Wait until we updating your channel information';

                this.form.patch(route('user.channels.update', [App.user.username, this.channel.slug]))
                    .then(({data}) => {
                        this.successThenRedirect(data.msg, data.redirectUrl)
                    })
                    .catch(error => {
                        this.loading = false;
                    });
            }
        }
    }
</script>
