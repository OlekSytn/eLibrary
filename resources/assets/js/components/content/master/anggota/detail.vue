<template>
  <div class="main-content">
    <div v-if="loggedIn">
      <div class="main-content__top">
        <h1 class="main-content__title">
          Detail Anggota
        </h1>
      </div>

      <div class="main-content__body">
        <b-card class="mr-15">
          <h2>{{ member.name }}</h2>
          <p>Email: {{ member.email }}</p>
          <p>Telp/HP: {{ member.phone_number }}</p>
          <p>Alamat: {{ member.address }}</p>
          <div>
            <router-link :to="`/master/anggota/edit/${member.id}`">
              <b-button variant="outline-success">Edit Member</b-button>
            </router-link>
            <router-link :to="`/master/anggota`">
              <b-button variant="outline-danger">Back</b-button>
            </router-link>
          </div>
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
      member: ''
    }
  },
  created() {
    let uri = window.location.href.split('/')
    const member_id = uri[uri.length-1]
    axios.get(`/api/member/${member_id}`)
      .then(res => this.member = res.data.data)
      .catch(error => console.log(error.response.data))
  }
}
</script>

<style>
  .mr-15 {
    margin-right: 15px
  }
</style>
