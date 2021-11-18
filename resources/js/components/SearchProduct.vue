<template>
    <div class="w-full">
        <input type="text" v-model="search" class="w-full px-4 py-3 rounded" />
    </div>
</template>

<script>
import axios from "axios";
import eventBus from "../services/EventBus";
export default {
    data() {
        return {
            search: "",
            results: [],
        };
    },

    watch: {
        search: function (value) {
            this.getResult();
        },
    },

    methods: {
        getResult() {
            axios
                .get("/api/search", {
                    params: {
                        query: this.search,
                    },
                })
                .then(({ data }) => {
                    this.results = data.products;
                    this.emitProductResultEvent();
                });
        },

        emitProductResultEvent() {
            eventBus.$emit("product-event", this.results);
        },
    },
};
</script>

<style lang="scss" scoped></style>
