<template>
  <nav class="navbar navbar-expand-lg bg-dark p-3 mb-5">
    <div class="container-fluid">
      <a class="text-light" href="#" @click.prevent="showWatchList = false">
        Books
      </a>
      <a class="text-light" href="#" @click.prevent="showWatchList = true">
        Watch List
      </a>
    </div>
  </nav>
  <!-- ------------------------books card -------------------------- -->
  <div v-if="!showWatchList" class="row row-cols-1 row-cols-md-3 g-4">
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
            <p class="card-text">{{ formatPrice(book.price) }}</p>
          </div>
          <div class="d-flex justify-content-between">
            <p class="card-text">{{ book.isbn }}</p>
            <button
              class="btn btn-primary"
              v-on:click="addToWatchList(book)"
              v-bind:disabled="isInWatchList(book)"
            >
              Add to Wish List
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- --------------------------watch list-------------------------- -->
  <div class="container my-4" v-if="showWatchList">
    <h2>Watch List</h2>
    <div v-if="watchList.length === 0">
      <p class="text-danger">
        Your watch list is empty. Please add some books.
      </p>
    </div>

    <table class="table" v-else>
      <thead>
        <tr>
          <th scope="col">ISBN</th>
          <th scope="col">Title</th>
          <th scope="col">Author</th>
          <th scope="col">Category</th>
          <th scope="col">Number of Pages</th>
          <th scope="col">Price</th>
          <!-- Add an empty column for the Remove button -->
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="book in watchList" :key="book.isbn">
          <td>{{ book.isbn }}</td>
          <td>{{ book.name }}</td>
          <td>{{ book.author }}</td>
          <td>{{ book.category }}</td>
          <td>{{ book.numberOfPages }}</td>
          <td>{{ formatPrice(book.price) }}</td>
          <td>
            <button class="btn btn-danger" @click="removeFromWatchList(book)">
              Remove
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { books } from "../assets/data/books.js";
export default {
  name: "bookComponent",
  data: () => ({
    books,
    showWatchList: false,
    watchList: [],
  }),
  methods: {
    addToWatchList(book) {
      this.watchList.push(book);
    },
    isInWatchList(book) {
      return this.watchList.some((b) => b.isbn === book.isbn);
    },
    removeFromWatchList(book) {
      const index = this.watchList.findIndex((b) => b.isbn === book.isbn);
      if (index !== -1) {
        this.watchList.splice(index, 1);
      }
    },
    formatPrice(price) {
      const priceFormatter = new Intl.NumberFormat("ar-SA", {
        style: "currency",
        currency: "SAR",
      });
      const formattedPrice = priceFormatter.format(price);
      return formattedPrice;
    },
  },
  props: {
    msg: String,
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

a {
  text-decoration: none;
}
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
