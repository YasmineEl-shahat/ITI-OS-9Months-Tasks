<template>
  <!-- ------------------------books card -------------------------- -->
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col" v-for="book in books" :key="book.isbn">
      <div class="card h-100" style="cursor: pointer">
        <img :src="book.image" class="card-img-top" alt="Book Cover" />
        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between">
            <span class="badge bg-secondary">{{ book.category }}</span>
            <span class="text-muted">{{ book.author }}</span>
          </div>
          <div class="d-flex justify-content-between mt-3">
            <p
              :class="['card-text', book.numberOfPages < 50 ? 'less' : 'more']"
            >
              {{ book.numberOfPages }} pages
            </p>
            <p class="card-text">{{ book.price }}</p>
          </div>
          <div class="d-flex justify-content-between">
            <p class="card-text">{{ book.isbn }}</p>
            <button
              class="btn btn-primary"
              v-on:click="booksStore.addToWatchList(book)"
              v-bind:disabled="booksStore.isInWatchList(book)"
            >
              Add to Wish List
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { useBooksStore } from "@/stores/bookStore";
export default {
  name: "bookComponent",
  data: () => ({
    booksStore: useBooksStore(),
    books: [],
  }),
  async created() {
    this.books = await this.booksStore.getBooks();
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.card-img-top {
  height: 300px;
  object-fit: cover;
}
.less {
  color: #ffc107;
}

.more {
  color: #198754;
}
</style>
