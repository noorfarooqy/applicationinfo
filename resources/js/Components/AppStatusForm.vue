<template>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Secret code</label>
                    <input type="text" class="form-control" id="application_name" placeholder="Application name"
                        autocomplete="application_name" v-model="appstatus.secret_code">
                </div>
            </div>
            <div class="col">
                <button class="btn btn-primary" v-if="is_on" @click="submitForm(0)">Turn off maintenance mode</button>
                <button class="btn btn-primary" v-else @click="submitForm(1)">Turn on maintenance mode</button>
            </div>

        </div>
    </div>
</template>


<script>
import Server from './../server';
export default {
    data() {
        return {
            name: 'appinfo-vue',
            appstatus: {},
            is_on: false,
            server: new Server(),
            is_loading: false,
        };
    },
    mounted() {
        this.appstatus = this.resetAppInfo();

        this.getAppStatus();
    },
    methods: {
        resetAppInfo() {
            return {
                'secret_code': null,
                'status_code': this.is_on,
            };
        },
        submitForm(status = 1) {
            if (this.is_loading) return;
            this.is_loading = true;
            this.appstatus.is_on = status == 1;
            this.server.setRequest(this.appstatus);
            this.server.PostRequest('/admin/appinfo/api/appstatus', this.updatedApp, this.errorMessage)
        },

        updatedApp(data) {
            this.is_loading = false;
            console.log(data);
            this.successMessage('Update application status');
        },
        getAppStatus() {
            this.server.GetRequest('/admin/appinfo/api/status', this.setAppInfo, this.errorMessage);
        },
        setAppInfo(data) {
            this.is_on = data['is_on'];
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