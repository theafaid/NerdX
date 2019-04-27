<script>
    export default {

        data(){
            return{
                loading: false,
                alertText: '',
            }
        },

        watch: {
            loading(){
                this.loading == true ? this.showLoadingModal(this.alertText) : this.hideLodaingModal();
            }
        },

        methods:{

            fire(text,type = 'success', timer = 3000, toast = true , position = 'top-end', showConfirmButton = false){
                const Toast = Swal.mixin({
                    toast: toast,
                    position: position,
                    showConfirmButton: showConfirmButton,
                    timer: timer
                });

                return Toast.fire({
                    type: type,
                    title: text
                })
            },

            successThenRedirect(text = null, redirectUrl){
                setTimeout(() => {
                    this.fire(text).then(() => {window.location = redirectUrl});
                }, 200);
            },

            showLoadingModal(text){
                if(this.loading) {
                    Swal.fire({
                        html: text,
                        onBeforeOpen: () => {
                            Swal.showLoading();
                        }
                    })
                }
            },

            hideLodaingModal(){
                Swal.close();
            }
        }
    }
</script>