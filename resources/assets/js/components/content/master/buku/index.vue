<template>
  <div class="main-content">
    <div v-if="loggedIn">
      <div class="main-content__top">
        <h1 class="main-content__title">
          Data Buku
        </h1>
      </div>

      <div class="main-content__body">
        <b-card>
          <router-link to="/master/buku/tambah">
            <b-button variant="primary">Tambah Buku</b-button>
          </router-link>
          <hr>
          <v-client-table :data="tableData" :columns="columns" :options="options">
            <div slot="__actions" slot-scope="props">
              <router-link :to="`/master/buku/detail/${props.row.id}`">
                <b-button variant="outline-primary" size="sm">Detail</b-button>
              </router-link>
              <router-link :to="`/master/buku/edit/${props.row.id}`">
                <b-button variant="outline-success" size="sm">Edit</b-button>
              </router-link>
              <router-link :to="`/master/buku/delete/${props.row.id}`">
                <b-button variant="outline-danger" size="sm">Hapus</b-button>
              </router-link>
            </div>
          </v-client-table>
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
      columns: ['title', 'category_name', 'isbn', '__actions'],
      tableData: [],
      options: {
        headings: {
          title: 'Nama',
          category_name: 'Kategori',
          isbn: 'ISBN',
        },
        sortable: ['title', 'category_name', 'isbn'],
        filterable: ['title', 'category_name', 'isbn'],
      }
    }
  },
  mounted() {
    axios.get('/api/book').then(res => {
      this.tableData = res.data.data
    })
  },
  methods: {
    tombol() {
      return 'aaa'
    }
  }
}
</script>

<style>

</style>
