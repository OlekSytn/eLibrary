import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Login from '../components/login/login'
import Home from '../components/content/index'
import MasterBuku from '../components/content/master/buku/index'
import MasterTambahBuku from '../components/content/master/buku/tambah'
import MasterDetailBuku from '../components/content/master/buku/detail'
import MasterEditBuku from '../components/content/master/buku/edit'
import MasterHapusBuku from '../components/content/master/buku/hapus'
import MasterAnggota from '../components/content/master/anggota/index'
import MasterTambahAnggota from '../components/content/master/anggota/tambah'
import MasterEditAnggota from '../components/content/master/anggota/edit'
import MasterHapusAnggota from '../components/content/master/anggota/hapus'
import MasterDetailAnggota from '../components/content/master/anggota/detail'
import MasterKategori from '../components/content/master/kategori/index'
import MasterTambahKategori from '../components/content/master/kategori/tambah'
import MasterEditKategori from '../components/content/master/kategori/edit'
import MasterHapusKategori from '../components/content/master/kategori/hapus'
import MasterPenerbit from '../components/content/master/penerbit/index'
import MasterTambahPenerbit from '../components/content/master/penerbit/tambah'
import MasterEditPenerbit from '../components/content/master/penerbit/edit'
import MasterHapusPenerbit from '../components/content/master/penerbit/hapus'
import MasterPenulis from '../components/content/master/penulis/index'
import MasterTambahPenulis from '../components/content/master/penulis/tambah'
import MasterEditPenulis from '../components/content/master/penulis/edit'
import MasterHapusPenulis from '../components/content/master/penulis/hapus'
import TrPinjam from '../components/content/transaksi/pinjam/index'
import TrTambahPinjam from '../components/content/transaksi/pinjam/tambah'
import TrEditPinjam from '../components/content/transaksi/pinjam/edit'
import TrDetailPinjam from '../components/content/transaksi/pinjam/detail'
import TrDeletePinjam from '../components/content/transaksi/pinjam/hapus'
import TrKembalikan from '../components/content/transaksi/kembalikan/index'
import TrTambahKembalikan from '../components/content/transaksi/kembalikan/tambah'
import TrEditKembalikan from '../components/content/transaksi/kembalikan/edit'
import TrDetailKembalikan from '../components/content/transaksi/kembalikan/detail'
import TrDeleteKembalikan from '../components/content/transaksi/kembalikan/hapus'
import Laporan from '../components/content/laporan/index'


const routes = [
  { path: '/', component: Home },
  { path: '/master/buku', component: MasterBuku },
  { path: '/master/buku/tambah', component: MasterTambahBuku },
  { path: '/master/buku/edit/:id', component: MasterEditBuku },
  { path: '/master/buku/detail/:id', component: MasterDetailBuku },
  { path: '/master/buku/delete/:id', component: MasterHapusBuku },
  { path: '/master/anggota', component: MasterAnggota },
  { path: '/master/anggota/tambah', component: MasterTambahAnggota },
  { path: '/master/anggota/edit/:id', component: MasterEditAnggota },
  { path: '/master/anggota/detail/:id', component: MasterDetailAnggota },
  { path: '/master/anggota/delete/:id', component: MasterHapusAnggota },
  { path: '/master/kategori', component: MasterKategori },
  { path: '/master/kategori/tambah', component: MasterTambahKategori },
  { path: '/master/kategori/edit/:id', component: MasterEditKategori },
  { path: '/master/kategori/delete/:id', component: MasterHapusKategori },
  { path: '/master/penerbit', component: MasterPenerbit },
  { path: '/master/penerbit/tambah', component: MasterTambahPenerbit },
  { path: '/master/penerbit/edit/:id', component: MasterEditPenerbit },
  { path: '/master/penerbit/delete/:id', component: MasterHapusPenerbit },
  { path: '/master/penulis', component: MasterPenulis },
  { path: '/master/penulis/tambah', component: MasterTambahPenulis },
  { path: '/master/penulis/edit/:id', component: MasterEditPenulis },
  { path: '/master/penulis/delete/:id', component: MasterHapusPenulis },
  { path: '/transaksi/pinjam-buku', component: TrPinjam },
  { path: '/transaksi/pinjam-buku/tambah', component: TrTambahPinjam },
  { path: '/transaksi/pinjam-buku/edit/:id', component: TrEditPinjam },
  { path: '/transaksi/pinjam-buku/detail/:id', component: TrDetailPinjam },
  { path: '/transaksi/pinjam-buku/delete/:id', component: TrDeletePinjam },
  { path: '/transaksi/kembalikan-buku', component: TrKembalikan },
  { path: '/transaksi/kembalikan-buku/tambah', component: TrTambahKembalikan },
  { path: '/transaksi/kembalikan-buku/edit/:id', component: TrEditKembalikan },
  { path: '/transaksi/kembalikan-buku/detail/:id', component: TrDetailKembalikan },
  { path: '/transaksi/kembalikan-buku/delete/:id', component: TrDeleteKembalikan },
  { path: '/laporan', component: Laporan },
  { path: '/login', component: Login }
]

const router = new VueRouter({
  routes,
  hashbang: false,
  mode: 'history'
})


export default router