<template>
    <!-- Modal -->
    <div class="modal fade" id="createChannelModal" tabindex="-1" role="dialog" aria-labelledby="createChannelModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Your New Channel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                                <label>Channel Description</label>
                                <textarea
                                        v-validate="'required|max:1000'"
                                        v-model="form.description"
                                        :class="{ 'is-invalid': form.errors.has('description') }"
                                        type="text"
                                        name="description"
                                        class="form-control"
                                        placeholder="Tell us what your channel will do ?"
                                        rows="7"
                                ></textarea>
                                <has-error :form="form" field="description"></has-error>
                                <span class="text-red">{{ errors.first('description') }}</span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-rounded btn-shadow float-right" data-dismiss="modal">Close</button>
                    <button  v-show="! loading && isValidForm" @click="submit" type="button" class="btn btn btn-primary btn-rounded btn-shadow float-right">Create</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Fire from '../../mixins/fire'

    export default {
        name: "edit",

        mixins: [Fire],

        data(){
            return {
                form: new Form({
                    name: '',
                    description: '',
                })
            }
        },

        computed: {
            isValidForm(){
                return this.form.name && this.form.description;
            }
        },

        methods:{
            submit(){
                this.isValidForm ? this.create() : this.fire('Please fill all fields', 'error');
            },

            create(){
                this.startLoading('Please wait until we create your new channel');

                this.form.post(route('channels.store', App.user.username))
                    .then(({data}) => {

                        $("#createChannelModal").hide();

                        this.stopLoading();

                        this.successThenRedirect(data.msg, data.redirectUrl);
                    })
                    .catch(error => {this.stopLoading()});
            },
        }
    }
</script>