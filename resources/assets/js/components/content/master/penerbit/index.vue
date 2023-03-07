<template>
  <div class="main-content">
    <div v-if="loggedIn">
      <div class="main-content__top">
        <h1 class="main-content__title">
          Data Penerbit
        </h1>
      </div>

      <div class="main-content__body">
        <b-card>
          <router-link to="/master/penerbit/tambah">
            <b-button variant="primary">Tambah Penerbit</b-button>
          </router-link>
          <hr>
          <v-client-table :data="tableData" :columns="columns" :options="options">
            <div slot="__actions" slot-scope="props">
              <router-link :to="`/master/penerbit/edit/${props.row.urlEdit}`">
                <b-button variant="outline-success" size="sm">Edit</b-button>
              </router-link>
              <router-link :to="`/master/penerbit/delete/${props.row.urlEdit}`">
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
      columns: ['id', 'name', 'phone_number', 'address', '__actions'],
      tableData: [],
      options: {
        // filterByColumn: true,
        headings: {
          id: 'ID',
          name: 'Nama',
          phone_number: 'Telp',
          address: 'Alamat',
          urlEdit: "Edit",
        }
      },
      sortable: ['id', 'name', 'phone_number', 'address'],
      filterable: ['id', 'name', 'phone_number', 'address'],
    }
  },
  mounted() {
    axios.get('/api/publisher').then(res => {
      this.tableData = res.data.data
    }).catch(error => console.log(error))
  }
}
</script>

<style>
  .vuetable th#__actions { width: 50px }
</style>
