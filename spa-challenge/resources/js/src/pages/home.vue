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
                            <h2>Recent Orders</h2>
                        </div>
                        <vs-row vs-justify="center">
                            <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="6">
                            <vs-card actionable class="cardx">
                                <div slot="header">
                                <h3>
                                    Hello world !
                                </h3>
                                </div>
                                <div slot="media">
                                <img :src="('/card.png')">
                                </div>
                                <div>
                                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit</span>
                                </div>
                                <div slot="footer">
                                <vs-row vs-justify="flex-end">
                                    <vs-button color="primary" type="gradient" >View</vs-button>
                                    <vs-button color="danger" type="gradient">Delete</vs-button>
                                </vs-row>
                                </div>
                            </vs-card>
                            </vs-col>
                            <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="6">
                            <vs-card actionable class="cardx">
                                <div slot="header">
                                <h3>
                                    Hello world !
                                </h3>
                                </div>
                                <div slot="media">
                                <img :src="('/card2.png')">
                                </div>
                                <div>
                                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit</span>
                                </div>
                                <div slot="footer">
                                <vs-row vs-justify="flex-end">
                                    <vs-button color="primary" type="gradient" >View</vs-button>
                                    <vs-button color="danger" type="gradient" >Delete</vs-button>
                                </vs-row>
                                </div>
                            </vs-card>
                            </vs-col>
                        </vs-row>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Sidebar from '../layouts/sidebar.vue'
export default {
//   name: 'home',
  components: {
    Sidebar,
  },
  data() {
    return {
    
    }
  },
}
</script>