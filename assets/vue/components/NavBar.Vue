<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <router-link
      class="navbar-brand"
      to="/home"
    >
      Bibliothèque
    </router-link>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon" />
    </button>
    <div
      id="navbarNav"
      class="collapse navbar-collapse"
    >
      <ul class="navbar-nav">
        <router-link
          class="nav-item"
          tag="li"
          to="/home"
          active-class="active"
        >
          <a class="nav-link">Accueil</a>
        </router-link>
        <router-link
          class="nav-item"
          tag="li"
          to="/home"
          active-class="active"
        >
          <a class="nav-link">Livres</a>
        </router-link>
        <router-link
          class="nav-item"
          tag="li"
          to="/home"
          active-class="active"
        >
          <a class="nav-link">Maisons d'édition</a>
        </router-link>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Navbar"
};
</script>