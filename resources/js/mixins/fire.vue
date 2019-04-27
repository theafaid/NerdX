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
                this.loading == true ? this.showLoadingModal(this.alertText) : this.hideLoadingModal();
            }
        },

        methods:{

            fire(text,type = 'success', timer = 1500, toast = true , position = 'top-end', showConfirmButton = false){
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

                if(! Swal.isLoading()){
                    this.fire(text).then(() => {window.location = redirectUrl});
                }else{
                    setTimeout(() => {
                        this.fire(text).then(() => {window.location = redirectUrl});
                    }, 300);
                }
            },

            startLoading(text = null){
                this.loading = true;
                this.alertText = text;
            },

            stopLoading(){
                this.loading = false;
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

            hideLoadingModal(){
                Swal.close();
            }
        }
    }
</script>