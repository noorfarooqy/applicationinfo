<template>
    <div class="card mt-3">
        <div class="card-header">
            Update application logo <span class="spinner-border text-primary me-2" v-if="is_loading"></span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="formFile" class="form-label mt-0">Application logo </label>
                        <input class="form-control" type="file" @change="setUpLogo">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="formFile" class="form-label mt-0">Mobile logo</label>
                        <input class="form-control" type="file" @change="setUpMobileLogo">
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
import Server from './../server.js';
export default {
    data() {
        return {
            appinfo: {
                app_logo : null,
                logo_type: 1,
            },
            server: new Server(),
            is_loading: false,
        };
    },
    methods: {
        setUpLogo(event) {
            console.log(event);
            this.uploadLogo(event);
            // this.server.previewFile(event.target, this.uploadLogo, this.errorMessage)
            
        },
        uploadLogo(logo, logo_type=1){
            
            if (this.is_loading) return;
            this.is_loading = true;

            var formdata = new FormData();
            formdata.append('app_logo',logo.target.files[0]);
            formdata.append('logo_type', logo_type);
            this.server.setRequest(formdata);
            this.server.PostRequest('/admin/appinfo/api/logo', this.updatedLogo, this.errorMessage);
        },
        updatedLogo(data){
            this.successMessage('Updated the logo successfully');
            this.is_loading = false;
        },

        setUpMobileLogo(event) {
            this.uploadLogo(event, 2);
        },
        successMessage(message) {
            console.log(message);
            swal({
                title: "Success",
                text: message,
                type: "success",
                cancelButtonText: 'Ok'
            });
        },
        errorMessage(error) {
            this.is_loading = false;
            console.log(error);

            swal({
                title: "Error",
                text: error,
                type: "error",
                cancelButtonText: 'Ok'
            });
        }
    },
}
</script>