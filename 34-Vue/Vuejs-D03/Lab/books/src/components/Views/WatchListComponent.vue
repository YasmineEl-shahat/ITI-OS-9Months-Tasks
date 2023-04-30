<template>
  <!-- --------------------------watch list-------------------------- -->
  <div class="container my-4">
    <h2>Watch List</h2>
    <div v-if="booksStore.watchList.length == 0">
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
          <td>{{ book.price }}</td>
          <td>
            <button
              class="btn btn-danger"
              @click="booksStore.removeFromWatchList(book)"
            >
              Remove
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { useBooksStore } from "@/stores/bookStore";

export default {
  name: "WatchListComponent",
  components: {},
  data: () => ({
    booksStore: useBooksStore(),
    watchList: [],
  }),
  async created() {
    this.watchList = await this.booksStore.getWatchList();
  },
};
</script>

<style>
* {
  margin: 0;
  padding: 0;
}
</style>
