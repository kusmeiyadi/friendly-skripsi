<template>
  <li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="far fa-bell"></i> <span class="badge badge-warning navbar-badge" v-if="pengaduans.length!=0">
      {{ pengaduans.length }}</span><span class="caret"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" aria-labelledby="alertsDropdown">
      <span class="dropdown-item dropdown-header">Pengaduan Masuk</span>
      <div v-for="pengaduan in pengaduans">
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#" v-on:click="MarkAsRead(pengaduan)">
        <i class="fas fa-envelope mr-2"></i>{{ pengaduan.data['pengaduan']['title'] }}
        <span class="float-right text-muted text-sm">{{ pengaduan.created_at | myOwnTime }}</span>
      </a>
      </div>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item dropdown-footer" href="#" v-on:click="AllMarkAsRead()" v-if="pengaduans.length!=0">
        Read All Mark As Read
      </a>
      <a class="dropdown-item dropdown-footer" href="#" v-if="pengaduans.length==0">
        No Notification
      </a>
    </div>
  </li>
</template>

<script>
  export default {
    props: ['pengaduans'],

    methods : {

      MarkAsRead:function(pengaduan){

        const data = {
          not_id : pengaduan.id,
          slug_title : pengaduan.slug,
          usernot_id : pengaduan.user_id,
          create_pengaduan : pengaduan.created_at,
          body_pengaduan : pengaduan.body,
          pengaduan_id : pengaduan.data.pengaduan.id,
          pengaduan_slug : pengaduan.data.pengaduan.slug
        };

        axios.post("/markAsRead", data).then(response => {

          window.location.href="/readPengaduan/" + data.pengaduan_id;

        });

      },

      AllMarkAsRead:function(){
        axios.post('/allMarkAsread').then(response => {
          window.location.href="/readAllPengaduan";
        });
      }

    }

  };
</script>
