export default {

  // home is a section without childs, set as an empty array
  home: [],

  master: [
    {
      type: 'title',
      txt: 'Master',
      icon: 'database',
    },
    {
      type: 'link',
      txt: 'Anggota',
      link: '/master',
    },
    {
      type: 'link',
      txt: 'Buku',
      link: '/master',
    },
    {
      type: 'link',
      txt: 'Kategori',
      link: '/master',
    },
    {
      type: 'link',
      txt: 'Penerbit',
      link: '/master',
    },
    {
      type: 'link',
      txt: 'Penulis',
      link: '/master',
    }
  ],

  loan: [
    {
      type: 'title',
      txt: 'Transaksi',
      icon: 'exchange',
    },
    {
      type: 'link',
      txt: 'Pinjam Buku',
      link: '/transaksi',
    },
    {
      type: 'link',
      txt: 'Kembalikan Buku',
      link: '/transaksi',
    }
  ],

  report: [
    {
      type: 'title',
      txt: 'Laporan',
      link: '/laporan',
    },
    {
      type: 'link',
      txt: 'Laporan Buku',
      link: '/laporan',
    },
    {
      type: 'link',
      txt: 'Laporan Peminjaman',
      link: '/laporan',
    }
  ],

  setting: [],

  logout: []
}