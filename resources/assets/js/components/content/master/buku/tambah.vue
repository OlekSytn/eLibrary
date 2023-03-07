<template>
  <div class="main-content">
    <div v-if="loggedIn">
      <div class="main-content__top">
        <h1 class="main-content__title">
          Tambah Buku
        </h1>
      </div>

      <div class="main-content__body">
        <b-card class="mr-15">
          <b-form @submit.prevent="onSubmit">
            <b-form-group label="Judul buku:" label-for="title">
              <b-form-input id="title"
                            type="text"
                            v-model="form.title"
                            required
                            placeholder="Tuliskan judul buku">
              </b-form-input>
              <div class="alert alert-danger mt-5" v-if="errors.title" variant="primary">{{ errors.title[0] }}</div>
            </b-form-group>
            <b-form-group label="ISBN:" label-for="isbn">
              <b-form-input id="isbn"
                            type="text"
                            v-model="form.isbn"
                            placeholder="Tuliskan ISBN">
              </b-form-input>
              <div class="alert alert-danger mt-5" v-if="errors.isbn" variant="primary">{{ errors.isbn[0] }}</div>
            </b-form-group>
            <b-form-group label="Tahun Terbit:" label-for="book_year">
              <b-form-input id="book_year"
                            type="text"
                            v-model="form.book_year"
                            placeholder="Tuliskan Tahun Terbit">
              </b-form-input>
              <div class="alert alert-danger mt-5" v-if="errors.book_year" variant="primary">{{ errors.book_year[0] }}</div>
            </b-form-group>
            <b-form-group label="Tanggal Buku Masuk:" label-for="purchase_date">
              <datepicker format="yyyy-M-dd" input-class="form-control" v-model="form.enter_date" name="purchase_date"></datepicker>
              <div class="alert alert-danger mt-5" v-if="errors.purchase_date" variant="primary">{{ errors.purchase_date[0] }}</div>
            </b-form-group>
            <b-form-group label="Kategori:" label-for="category_id">
              <b-form-select name="category_id" v-model="form.category_id" :options="categories" />
            </b-form-group>
            <b-form-group label="Penerbit:" label-for="publisher_id">
              <b-form-select name="publisher_id" v-model="form.publisher_id" :options="publishers" />
            </b-form-group>
            <b-form-group label="Penulis:" label-for="author_id">
              <b-form-select name="author_id" v-model="form.author_id" :options="authors" />
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
import Datepicker from 'vuejs-datepicker';
export default {
  components: { Datepicker },
  data() {
    return {
      loggedIn: User.loggedIn(),
      form: {
        title: null,
        isbn: null,
        book_year: null,
        purchase_date: null,
        status: '',
        phone_number: null,
        category_id: '',
        publisher_id: '',
        author_id: ''
      },
      categories: [],
      publishers: [],
      authors: [],
      opsiStatus: [
        { text: 'Tersedia', value: 1 },
        { text: 'Dipinjam', value: 2 }
      ],
      errors: {}
    }
  },
  created() {
    // this.callBook()
    this.callCategoryList()
    this.callPulbisherList()
    this.callAuthorList()
  },
  methods: {
    // callBook() {
    //   axios.get(`/api/book/${this.$route.params.id}`).then(res => {
    //     this.form = res.data.data
    //   }).catch(error => console.log(error))
    // },
    callCategoryList() {
      axios.get('/api/category/select/list').then(res => {
        this.categories = res.data.data
      }).catch(error => console.log(error))
    },
    callPulbisherList() {
      axios.get('/api/publisher/select/list').then(res => {
        this.publishers = res.data.data
      }).catch(error => console.log(error))
    },
    callAuthorList() {
      axios.get('/api/author/select/list').then(res => {
        this.authors = res.data.data
      }).catch(error => console.log(error))
    },
    onSubmit() {
      axios.post("/api/book", this.form).then(res => {
        window.location = "/master/buku/";
      }).catch(error => {
        console.log(error);
        this.errors = error
      })
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
