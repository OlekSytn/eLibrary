<template>
  <div class="main-content">
    <div v-if="loggedIn">
      <div class="main-content__top">
        <h1 class="main-content__title">
          Tambah Pinjam Buku
        </h1>
      </div>

      <div class="main-content__body">
        <b-card class="mr-15">
          <b-form @submit.prevent="onSubmit">
            <b-form-group label="Nama Member:" label-for="member_name">
              <v-select
                label="name"
                v-model="form.member"
                :filterable="false"
                :options="option_members"
                @search="onSearchMember">
                <template slot="no-options">
                  Ketikan nama member yang ingin meminjam...
                </template>
                <template slot="option" slot-scope="option">
                  <div class="d-center">
                    {{ option.name }}
                  </div>
                </template>
                <template slot="selected-option" slot-scope="option">
                  <div class="selected d-center">
                    {{ option.name }}
                  </div>
                </template>
              </v-select>
              </b-form-input>
            </b-form-group>
            <b-form-group label="Buku:" label-for="book_id">
              <v-select
                label="title"
                v-model="form.book"
                :filterable="false"
                :options="option_books"
                @search="onSearchBook">
                <template slot="no-options">
                  Ketikan judul buku yang ingin dipinjamkan...
                </template>
                <template slot="option" slot-scope="option">
                  <div class="d-center">
                    {{ option.title }}
                  </div>
                </template>
                <template slot="selected-option" slot-scope="option">
                  <div class="selected d-center">
                    {{ option.title }}
                  </div>
                </template>
              </v-select>
            </b-form-group>
            <b-form-group label="Harus Kembali:" label-for="must_returned_date">
              <datepicker format="yyyy-MM-dd" input-class="form-control" v-model="form.must_returned_date" name="must_returned_date"></datepicker>
              <div class="alert alert-danger mt-5" v-if="errors.must_returned_date" variant="primary">{{ errors.must_returned_date[0] }}</div>
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
import { debounce } from "debounce";
export default {
  components: { Datepicker },
  data() {
    return {
      loggedIn: User.loggedIn(),
      form: {
        loan_date: null,
        must_returned_date: null,
        return_date: null,
        amount_fines: null,
        member: {id: 0, name: 'Silahkan pilih member'},
        loan_date: '',
        status: '',
        book: {title: 'Silahkan pilih buku'}
      },
      categories: [],
      books: [],
      authors: [],
      opsiStatus: [
        { text: 'Tersedia', value: 1 },
        { text: 'Dipinjam', value: 2 }
      ],
      errors: {},
      option_books: [],
      option_members: [],
      selected: {},
    }
  },
  created() {
    // this.callLoan()
    this.callBookList()
    // this.callMemberList()
    // this.callAuthorList()
  },
  methods: {
    onSearchBook(searchBook, loadingBook) {
      loadingBook(true);
      this.searchBook(loadingBook, searchBook, this);
    },
    searchBook: debounce((loadingBook, searchBook, vm) => {
      axios.get(`/api/book/search/${escape(searchBook)}`).then(res => {
        vm.option_books = res.data.data
        loadingBook(false)
      })
    }, 350),

    onSearchMember(searchMember, loadingMember) {
      loadingMember(true);
      this.searchMember(loadingMember, searchMember, this);
    },
    searchMember: debounce((loadingMember, searchMember, vm) => {
      axios.get(`/api/member/search/${escape(searchMember)}`).then(res => {
        vm.option_members = res.data.data
        loadingMember(false)
      })
    }, 350),

    callLoan() {
      axios.get(`/api/loan/${this.$route.params.id}`).then(res => {
        this.form = res.data.data
      }).catch(error => console.log(error))
    },
    callMemberList() {
      axios.get('/api/member/select/list').then(res => {
        this.categories = res.data.data
      }).catch(error => console.log(error))
    },
    callBookList() {
      axios.get('/api/book/select/list').then(res => {
        this.books = res.data.data
      }).catch(error => console.log(error))
    },
    onSubmit() {
      axios.post("/api/loan", this.form).then(res => {
        window.location = "/transaksi/pinjam-buku";
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
  .dropdown-toggle::after {
    content: none;
  }
  .v-select .dropdown li {
    border-bottom: 1px solid rgba(112, 128, 144, 0.1);
  }

  .v-select .dropdown li:last-child {
    border-bottom: none;
  }

  .v-select .dropdown li a {
    padding: 10px 20px;
    width: 100%;
    font-size: 1.25em;
    color: #3c3c3c;
  }

  .v-select .dropdown-menu .active > a {
    color: #fff;
  }
  
  .VueTables__search {
    margin-bottom: 15px;
  }
</style>
