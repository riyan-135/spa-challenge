<template>
  <div>
    <Sidebar />
    <div class="container">
        <!-- main -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!-- search -->
                <div class="search">
                    <label for="">
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
            </div>

            <div class="details">
            <!--order details list -->
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Product View</h2>
                    </div>
                  <div class="centerx">
                    <vs-button @click="popupActivo2=true" color="primary" type="filled">Open Popup</vs-button>
                    <vs-popup classContent="popup-example"  title="Lorem ipsum dolor sit amet" :active.sync="popupActivo2">
                      <vs-input 
                        class="inputx" 
                        placeholder="input name" 
                        v-model="put.product_name"
                        type="text"/>
                      <!-- <vs-input 
                        class="inputx w-full" 
                        type="file" 
                        v-model="put.product_image"/> -->
                      
                      <vs-input 
                        class="inputx"
                        type="number"
                        v-model="put.harga_barang"
                      />
                  <vs-button color="primary" class="mt-3" type="filled" @click="submitPost()">Save</vs-button>
                    </vs-popup>
                  </div>

                  <table>
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Name</td>
                                <td>Price</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="tr in posts" :key="tr.id">
                                <td>
                                  {{ tr.id }}
                                </td>
                                <td>
                                  {{ tr.product_name }}
                                </td>
                                <td>
                                  {{ tr.harga_barang }}
                                </td>
                                <td>
                                    <router-link :to="{ name: 'editProduct', params:{id:tr.id}}" class="btn btn-success">Edit</router-link>
                                    <vs-button color="danger" type="filled" @click="deleteProduct(tr.id)">Delete</vs-button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
import Sidebar from '../layouts/sidebar.vue'
import axios from 'axios'
export default {
  name: 'product',
  components: {
    Sidebar,
  },
  data() {
    return {
       popupActivo2:false,
       
       put: {
         product_name: '',
         harga_barang: ''
       },
       posts: [],
      idEdit:null,
      indexEdit:null,
      status_popup:false,
    }
  },

  created () {
    this.fetchCategrory()
  },

  methods: {
    async fetchCategrory () {
      this.loadData = true
      // try {
        await axios.get('/api/product/index')
          .then(response => {
            const data = response.data
            this.posts = data.data
            this.loadData = false
          })
    },
    // addItem (params) {
    //   this.posts.push(params)
    // },
    // closeDialog () {
    //   this.status_popup = false
    // },

    async submitPost() {
      const params = {
        product_name: this.put.product_name,
        // product_image: this.put.product_image,
        harga_barang: this.put.harga_barang
      }

      this.$vs.loading()
       await axios.post('/api/product', params)
        .then(response => {
          if (response.status) {
            const data = response.data
            this.$emit('addItem', data)
            this.$vs.loading.close()
            this.posts = data
            this.popupActivo = false
          
            this.$vs.notify({
              title:'Sukses',
              text:'Data berhasil di input',
              color:'success',
              position:'top-center'
            })
          } else {
            this.$vs.loading.close()
            this.popupActivo = false
            this.$vs.notify({
              title:'Gagal',
              text:'data gagal disimpan',
              color:'danger',
              position:'top-center'
            })
          }
        })
    },
      deleteProduct (id, tr) {
      this.$vs.loading()
       axios.get(`/api/delete/${id}`)
        .then(response => {
          this.$vs.loading.close()
          this.posts.splice(tr, 1)
        })
    },
    onEdit (item) {
      this.put.product_name = item.product_name
      this.idEdit = item.id
      this.put.harga_barang = item.harga_barang
      // this.status_popup = true
      // this.indexEdit = index
    },

    updateData () {
      this.$vs.loading()
      this.$axios.put(`/api/update/${this.idEdit}`, {
        product_name:this.put.product_name,
        harga_barang: this.harga_barang
      })
        .then(response => {
          const data = response.data
          this.$vs.loading.close()
          this.posts[this.indexEdit].name = data.product_name
          this.posts[this.indexEdit].harga_barang = data.harga_barang
          this.posts[this.indexEdit].slug = data.slug
          this.status_popup = false
          this.idEdit = null
          this.indexEdit = null
        })
    },
    closeDialog () {
      this.status_popup = false
    },
    addItem (params) {
      this.posts.push(params)
    },
  },
}
</script>

