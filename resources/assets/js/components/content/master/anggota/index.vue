<template>
  <div class="main-content">
    <div v-if="loggedIn">
      <div class="main-content__top">
        <h1 class="main-content__title">
          Data Anggota
        </h1>
      </div>

      <div class="main-content__body">
        <b-card>
          <router-link to="/master/anggota/tambah">
            <b-button variant="primary">Tambah Anggota</b-button>
          </router-link>
          <hr>
          <v-client-table :data="tableData" :columns="columns" :options="options">
            <div slot="__actions" slot-scope="props">
              <router-link :to="`/master/anggota/detail/${props.row.urlDetail}`">
                <b-button variant="outline-primary" size="sm">Detail</b-button>
              </router-link>
              <router-link :to="`/master/anggota/edit/${props.row.urlEdit}`">
                <b-button variant="outline-success" size="sm">Edit</b-button>
              </router-link>
              <router-link :to="`/master/anggota/delete/${props.row.urlEdit}`">
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
      columns: ['name', 'address', 'phone_number', '__actions'],
      tableData: [],
      options: {
        headings: {
          name: 'Nama',
          address: 'Alamat',
          phone_number: 'Telp/HP',
          urlDetail: "Detail",
          urlEdit: "Edit",
        },
        sortable: ['name', 'address', 'phone_number'],
        filterable: ['name', 'address', 'phone_number'],
      }
    }
  },
  mounted() {
    axios.get('/api/member').then(res => {
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
  .VuePagination {
    text-align: center;
  }

  .VueTables__sortable {
    text-align: center
  }

  .vue-title {
    text-align: center;
    margin-bottom: 10px;
  }

  .vue-pagination-ad {
    text-align: center;
  }

  .glyphicon.glyphicon-eye-open {
    width: 16px;
    display: block;
    margin: 0 auto;
  }

  th:nth-child(3) {
    text-align: center;
  }

  .VueTables__child-row-toggler {
    width: 16px;
    height: 16px;
    line-height: 16px;
    display: block;
    margin: auto;
    text-align: center;
  }

  .VueTables__child-row-toggler--closed::before {
    content: "+";
  }

  .VueTables__child-row-toggler--open::before {
    content: "-";
  }
  .VueTables__search {
    width: 50%;
    float: right;
    margin: auto;
    display: block;
  }
  .form-inline label {
    display: inline;
  }
  .VueTables__search-field {
    float: right;
  }
</style>
