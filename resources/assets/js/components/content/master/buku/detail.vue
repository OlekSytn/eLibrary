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
          <h2>{{ book.title }}</h2>
          <p>
            ISBN: {{ book.isbn }}<br>
            Kategori: {{ book.category.name }}<br>
            Tahun Terbit: {{ book.book_year }}<br>
            Tanggal Buku Masuk: {{ book.purchase_date }}<br>
          </p>
          <p>
            Nama Penerbit: {{ book.publisher ? book.publisher.name : '-' }}<br>
            Alamat Penerbit: {{ book.publisher ? book.publisher.address : '-' }}<br>
            No Telp Penerbit: {{ book.publisher ? book.publisher.phone_number : '-' }}<br>
          </p>
          <p>
            Nama Penulis: {{ book.author ? book.author.name : '-' }}<br>
            Alamat Penulis: {{ book.author ? book.author.address : '-' }}<br>
            No Telp Penulis: {{ book.author ? book.author.phone_number : '-' }}<br>
          </p>
          <div>
            <router-link :to="`/master/buku/edit/${book.id}`">
              <b-button variant="outline-success">Edit Buku</b-button>
            </router-link>
            <router-link :to="`/master/buku`">
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
      book: ''
    }
  },
  created() {
    let uri = window.location.href.split('/')
    const book_id = uri[uri.length-1]
    axios.get(`/api/book/${book_id}`)
      .then(res => this.book = res.data.data)
      .catch(error => console.log(error.response.data))
  }
}
</script>

<style>
  .mr-15 {
    margin-right: 15px
  }
</style>
