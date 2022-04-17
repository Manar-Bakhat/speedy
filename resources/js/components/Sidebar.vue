<template>
  <div>
    <div class="card p-0 m-0">
      <div class="card-body p-3">
        <div class="d-flex align-items-center small mb-0">
          <i class="fas fa-search mr-1"></i>
          <strong>Refine Your Job Search</strong>
        </div>
        <a
          href="#"
          class="job-filter d-md-none d-none"
          data-toggle="collapse"
          data-target="#accordion"
          aria-expanded="true"
          aria-controls="accordion"
        >
          <i class="icon icon-list"></i> Filter
        </a>
      </div>
    </div>
    <div id="accordion">
      <div class="card border-top-0">
        <div class="card-body p-3" id="jobCategories">
          <div class="pb-0">
            <div class="card-title mb-1">Service Categories</div>
            <div class="card-body p-0">
              <div class="form-group">
                <select
                  name="service_category"
                  class="form-control"
                  placeholder="Filter by Service Category"
                  @change="filterCategory($event)"
                >
                  <option disabled selected value>
                    -- select an option --
                  </option>
                  <option
                    v-for="category in categories"
                    :value="category.id"
                    :key="category.id"
                  >
                    {{ category.category_name }}
                  </option>
                </select>
              </div>
            </div>
          </div>
          <hr class="my-3" />
          <div class="pb-0">
            <div class="card-title mb-1"></div>
            <div class="card-body p-0">
              <div class="form-group">
                <select
                  name="service_category"
                  class="form-control"
                  placeholder="Filter by Service Category"
                  @change="filterServiceVille($event)"
                >
                  <option disabled selected value>
                    -- select an option --
                  </option>
                  <option value="Agadir">Agadir </option>
                    <option value="Beni Mellal">Beni Mellal</option>
                    <option value="Casablanca">Casablanca</option>
                    <option value="Chefchaouen">Chefchaouen</option>
                    <option value="Essaouira">Essaouira</option>
                    <option value="Fès">Fès</option>
                    <option value="Ifrane">Ifrane</option>
                    <option value="Kénitra">Kénitra</option>
                    <option value="Khénifra">Khénifra</option>
                    <option value="Khouribga">Khouribga</option>
                    <option value="Ksar El Kébir">Ksar El Kébir</option>
                    <option value="Marrakech">Marrakech</option>
                    <option value="Meknès">Meknès</option>
                    <option value="Nador">Nador</option>
                    <option value="Ouezzane">Ouezzane</option>
                    <option value="Rabat">Rabat</option>
                    <option value="Safi">Safi</option>
                    <option value="Salé">Salé</option>
                    <option value="Tanger">Tanger</option>
                    <option value="Tétouan">Tétouan</option>
                    <option value="Tanger">Tanger</option>

                </select>
              </div>
            </div>
          </div>
          <hr class="my-3" />

          <hr class="my-3" />

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "sidebar-component",
  data() {
    return {
      categories: [],
    };
  },
  mounted() {
    this.setCategoies();
  },
  methods: {
    setCategoies() {
      axios
        .get("/api/company-categories")
        .then((res) => res.data)
        .then((data) => {
          this.categories = JSON.parse(JSON.stringify(data));
        });
    },
    filterCategory(e) {
      this.$emit("get-by-category", e.target.value);
    },
    filterServiceVille(e) {
      this.$emit("get-by-service-ville", e.target.value);
    },
  },
};
</script>

<style>
</style>
