<template>
  <div class="main-content">
    <div v-if="loggedIn">
      <div class="main-content__top">
        <h1 class="main-content__title">
          Tambah Anggota
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
            <b-form-group label="Alamat:" label-for="address">
              <b-form-textarea name="address"
                      v-model="form.address"
                      placeholder="Tuliskan  alamat"
                      :rows="3"
                      :max-rows="6">
              </b-form-textarea>
              <div class="alert alert-danger mt-5" v-if="errors.address" variant="primary">{{ errors.address[0] }}</div>
            </b-form-group>
            <b-form-group label="Telp/HP:" label-for="phone_number">
              <b-form-input id="phone_number"
                            type="text"
                            v-model="form.phone_number"
                            placeholder="Tuliskan telp/HP">
              </b-form-input>
              <div class="alert alert-danger mt-5" v-if="errors.phone_number" variant="primary">{{ errors.phone_number[0] }}</div>
            </b-form-group>
            <b-form-group label="Email address:" label-for="email">
              <b-form-input id="email"
                            type="email"
                            v-model="form.email"
                            required
                            placeholder="Tuliskan email">
              </b-form-input>
              <div class="alert alert-danger mt-5" v-if="errors.email" variant="primary">{{ errors.email[0] }}</div>
            </b-form-group>
            <b-form-group label="Password:" label-for="password">
              <b-form-input id="password"
                            type="password"
                            v-model="form.password"
                            required
                            placeholder="Tuliskan password">
              </b-form-input>
              <div class="alert alert-danger mt-5" v-if="errors.password" variant="primary">{{ errors.password[0] }}</div>
            </b-form-group>
            <b-form-group label="Status">
              <b-form-radio-group v-model="form.status"
                                  :options="opsiStatus"
                                  name="radioInline">
              </b-form-radio-group>
              <div class="alert alert-danger mt-5" v-if="errors.status" variant="primary">{{ errors.status[0] }}</div>
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
        email: null,
        password: null,
        name: null,
        address: null,
        status: 'M',
        phone_number: null
      },
      opsiStatus: [
        { text: 'Admin', value: 'A' },
        { text: 'Member', value: 'M' }
      ],
      errors: {}
    }
  },
  methods: {
    onSubmit() {
      axios.post('/api/member', this.form).then(res => {
        window.location = "/master/anggota/detail/"+res.data.data.id;
      }).catch(error => this.errors = error.response.data.errors)
    }
  }
}
</script>

<style>
  .mr-15 {
    margin-right: 15px
  }
  .mt-5 {
    margin-top: 5px !important;
  }
</style>
