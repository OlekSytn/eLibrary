<template>

  <div class="main-content">

    <div class="main-content__top">
        <h1 class="main-content__title">
            Home
        </h1>
    </div>

    <div class="main-content__body">

      <p>Halo <b>{{ username }}</b>, selamat datang di aplikasi perpustakaan. Anda dapat melakukan proses pendataan buku dan juga peminjaman buku.</p>
      <p>Silahkan akses menu di sisi samping untuk melakukan proses lebih lanjut.</p>

    </div>

  </div>

</template>

<script>

export default {
  name: 'home',
  data() {
    return {
      username: User.name()
    }
  },
  created() {

  }
}

</script>