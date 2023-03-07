<template>
  <div class="main-content">
    <div class="main-content__top">
      <h1 class="main-content__title">
        Login
      </h1>
    </div>
    <div class="main-content__body">
      <b-card>
        <b-form @submit.prevent="onSubmit">
          <b-form-group label="Email address:"
                        label-for="exampleInput1">
            <b-form-input id="exampleInput1"
                          type="email"
                          v-model="form.email"
                          required
                          placeholder="Enter email">
            </b-form-input>
          </b-form-group>
          <b-form-group label="Password:"
                      label-for="exampleInput2">
            <b-form-input id="exampleInput2"
                          type="password"
                          v-model="form.password"
                          required
                          placeholder="Enter password">
            </b-form-input>
          </b-form-group>
          <b-button type="submit" variant="primary">Login</b-button>
        </b-form>
      </b-card>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        email: null,
        password: null
      }
    }
  },
  created() {
    if (User.loggedIn()) {
      this.$router.push('home')
    }
  },
  methods: {
    onSubmit() {
      User.login(this.form)
    }
  }
}
</script>

<style>

</style>
