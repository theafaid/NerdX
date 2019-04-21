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

            fire(text,type = 'success', toast = true , position = 'top-end', timer = 3000, showConfirmButton = false){
                const Toast = Swal.mixin({
                    toast: toast,
                    position: position,
                    showConfirmButton: showConfirmButton,
                    timer: timer
                });

                Toast.fire({
                    type: type,
                    title: text
                })
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