<template>
    <div>
        <h2>All Products</h2>

        <pre>
            {{ products }}
        </pre>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            products: {},
        };
    },
    created() {
        this.getAllPorducts();
    },
    methods: {
        getAllPorducts() {
            axios.get("/api/products").then(({ data }) => {
                this.products = data.products;
            });
        },
    },
    mounted() {
        console.log("Component mounted.");
    },
};
</script>
