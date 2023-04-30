// define store for counter :

import { defineStore } from "pinia";

// 2- define store ("id for your store", {
// data: state
// method :actions
// computed : getters
// })

export const useBooksStore = defineStore("booksstore", {
  state: () => ({ books: [], watchList: [] }),
  actions: {
    async getBooks() {
      const response = await fetch("http://localhost:3000/books");
      this.books = await response.json();
      return this.books;
    },
    async getWatchList() {
      const response = await fetch("http://localhost:3000/watchList");
      this.watchList = await response.json();
      return this.watchList;
    },
    async addToWatchList(book) {
      await fetch(`http://localhost:3000/watchList`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(book),
      });
      this.watchList.push(book);
    },
    isInWatchList(book) {
      return this.watchList.some((b) => b.isbn === book.isbn);
    },
    async removeFromWatchList(book) {
      if (confirm("Are you sure to delete")) {
        const index = this.watchList.findIndex((b) => b.isbn === book.isbn);
        if (index !== -1) {
          await fetch(`http://localhost:3000/watchList/${book.isbn}`, {
            method: "Delete",
          });
        }
        this.watchList.splice(index, 1);
      }
    },
  },
});
