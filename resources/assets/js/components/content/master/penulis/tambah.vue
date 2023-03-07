<template>
  <div class="main-content">
    <div v-if="loggedIn">
        <div class="main-content__top">
          <h1 class="main-content__title">
            Tambah Penerbit
          </h1>
        </div>

        <div class="main-content__body">
          <b-card class="mr-15">
            <b-form @submit.prevent="onSubmit">
              <b-form-group label="Nama lengkap:" label-for="name">
                <b-form-input id="name"
                              type="text"
                              v-model="form.name"
                              required
                              placeholder="Tuliskan nama lengkap">
                </b-form-input>
                <div class="alert alert-danger mt-5" v-if="errors.name" variant="primary">{{ errors.name[0] }}</div>
              </b-form-group>
              <b-form-group label="Nomor Telp:" label-for="phone_number">
                <b-form-input id="phone_number"
                              type="text"
                              v-model="form.phone_number"
                              required
                              placeholder="Tuliskan nomor telp">
                </b-form-input>
                <div class="alert alert-danger mt-5" v-if="errors.phone_number" variant="primary">{{ errors.phone_number[0] }}</div>
              </b-form-group>
              <b-form-group label="Alamat" label-for="address">
                <b-form-textarea id="address"
                     v-model="form.address"
                     placeholder="Enter something"
                     :rows="3"
                     :max-rows="6">
                </b-form-textarea>
                <div class="alert alert-danger mt-5" v-if="errors.address" variant="primary">{{ errors.address[0] }}</div>
              </b-form-group>
              <b-button type="submit" variant="primary">Simpan</b-button>
              <b-button onclick="self.history.back()" type="button" variant="danger">Batal</b-button>
            </b-form>
          </b-card>
        </div>
    </div>
    <div v-else>
      <b-card class="mtr-15">
        <b-alert class="mb-0" show variant="danger">Silahkan login terlebih dahulu!</b-alert>
      </b-card>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loggedIn: User.loggedIn(),
      form: {
        name: ''
      },
      errors: {}
    }
  },
  methods: {
    onSubmit() {
      axios.post('/api/author', this.form).then(res => {
        this.$router.push('/master/penulis')
      }).catch(error => console.log(error))
    }
  }
}
</script>

<style>

</style>
