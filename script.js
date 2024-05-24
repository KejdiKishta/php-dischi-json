const { createApp } = Vue

createApp({
    data() {
        return {
            discs: [],
        }
    },
    created() {
        axios
        .get("http://localhost/boolean/php-dischi-json/server.php")
        .then((resp) => {
            console.log(resp);
            this.discs = resp.data
        })
    },
    methods: {
        toggleLike(index) {
            const data = {
                action: "toggle-like",
                like_index: index,
            }

            axios
            .post("http://localhost/boolean/php-dischi-json/server.php", data, {
                headers: {
                    "Content-Type": "multipart/form-data",
                }
            })
            .then((resp) => {
                console.log(resp);
                this.discs = resp.data
            })
        }
    }
}).mount('#app')