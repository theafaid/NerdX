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
            <div class="form-group">
                <label for="logo">Channel Logo</label>
                <input class="form-control" type="file" name="logo">
            </div>
        </div>

        <div class="m-t-30">
            <button class="btn btn-primary btn-rounded btn-shadow float-right" type="submit" name="save">Create my channel</button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "CreateChannel",

        data(){
            return {
                form: new Form({
                    name: '',
                    description: '',
                    logo: false
                }),
                loading: false
            }
        },

        computed: {
            isValidForm(){
                return this.form.name;
            }
        },

        methods:{
            submit(){
                if(this.isValidForm){
                    this.loading = true;

                    this.showLoadingModal();
                    this.create();
                }
            },

            create(){

                this.form.post('/channels')
                    .then(({data}) => {
                        this.loading = false;
                        this.alertSuccess(data.msg, data.redirectUrl);
                    });
            },

            showLoadingModal(){
                if(this.loading){
                    let timerInterval
                    Swal.fire({
                        html: 'Creating your channel ...',
                        timer: 1000,
                        onBeforeOpen: () => {
                            Swal.showLoading();
                        }
                    })
                }
            },

            alertSuccess(message, url){
                Swal.fire(
                    message,
                    '',
                    'success'
                ).then(() => {
                    window.location = url
                });
            }
        }
    }
</script>