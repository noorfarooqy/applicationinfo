<template>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Application name</label>
                    <input type="text" class="form-control" id="application_name" placeholder="Application name"
                        autocomplete="application_name" v-model="appinfo.app_name">
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Application email</label>
                    <input type="email" class="form-control" id="application_email" placeholder="Application email"
                        autocomplete="application_email" v-model="appinfo.app_email">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Application phone</label>
                    <input type="text" class="form-control" id="application_phone" placeholder="Application phone"
                        autocomplete="application_phone" v-model="appinfo.app_phone">
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Application address</label>
                    <input type="text" class="form-control" id="application_address" placeholder="Application address"
                        autocomplete="application_address" v-model="appinfo.app_address">
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label">Locale Language</label>
                    <select class="form-control select2 form-select" data-placeholder="Choose language" tabindex="-1"
                        aria-hidden="true" v-model="appinfo.app_locale">
                        <option label="Choose language">
                        </option>
                        <option value="en" selected>English</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input type="submit" value="Save" class="btn btn-primary" @click.prevent="submitForm">
            </div>
        </div>
    </div>
</template>


<script>
    import Server from './../server';
    import Alert from './../alerts.js';
    export default {
        data() {
            return {
                name: 'appinfo-vue',
                appinfo: {},
                server: new Server(),
                alert: new Alert(),
                is_loading: false,
            };
        },
        mounted() {
            this.appinfo = this.resetAppInfo();

            this.getAppInfo();
        },
        methods: {
            resetAppInfo() {
                return {
                    'app_name': null,
                    'app_logo': null,
                    'app_logo_mobile': null,
                    'app_email': null,
                    'app_phone': null,
                    'app_phone': null,
                    'app_address': null,
                    'app_locale': 'en',
                };
            },
            submitForm() {
                if (this.is_loading) return;
                this.is_loading = true;
                this.server.setRequest(this.appinfo);
                this.server.PostRequest('/appinfo/api/update', this.updatedApp, this.errorMessage)
            },
            
            updatedApp(data) {
                this.is_loading = false;
                console.log(data);
                this.successMessage('Update application information');
            },
            getAppInfo(){
                this.server.GetRequest('/appinfo/api/info', this.setAppInfo, this.errorMessage);
            },
            setAppInfo(data){
                this.appinfo = data;
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