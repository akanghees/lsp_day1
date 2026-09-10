<aside class="sidebar-wrapper">
          <div class="iconmenu">
            <div class="nav-toggle-box">
              <div class="nav-toggle-icon"><i class="bi bi-list"></i></div>
            </div>
            <ul class="nav nav-pills flex-column">
              <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-dashboard" type="button"><i class="bi bi-house-door-fill"></i></button>
              </li>
              <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Profil Sekolah">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-profil" type="button"><i class="bi bi-bank2"></i></button>
              </li>
              <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Berita">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-berita" type="button"><i class="bi bi-newspaper"></i></button>
              </li>
              <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Ekstrakurikuler">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-ekskul" type="button"><i class="bi bi-star-fill"></i></button>
              </li>
              <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Galeri">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-galeri" type="button"><i class="bi bi-image-fill"></i></button>
              </li>
              <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Data Guru">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-guru" type="button"><i class="bi bi-person-badge-fill"></i></button>
              </li>
              <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Data Siswa">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-siswa" type="button"><i class="bi bi-mortarboard-fill"></i></button>
              </li>
            </ul>
          </div>
          <div class="textmenu">
            <div class="brand-logo">
              <img src="{{ asset('assets/images/brand-logo-2.png') }}" width="140" alt=""/>
            </div>
            <div class="tab-content">

              <div class="tab-pane fade" id="pills-dashboard">
                <div class="list-group list-group-flush">
                  <div class="list-group-item">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-0">Dashboard</h5>
                    </div>
                    <small class="mb-0">Ringkasan data website sekolah</small>
                  </div>
                  <a href="{{ route('admin.dashboard') }}" class="list-group-item"><i class="bi bi-speedometer2"></i>Ringkasan</a>
                </div>
              </div>

              <div class="tab-pane fade" id="pills-profil">
                <div class="list-group list-group-flush">
                  <div class="list-group-item">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-0">Profil Sekolah</h5>
                    </div>
                    <small class="mb-0">Identitas & informasi sekolah</small>
                  </div>
                  <a href="{{ route('admin.school-profile.edit') }}" class="list-group-item"><i class="bi bi-pencil-square"></i>Edit Profil Sekolah</a>
                </div>
              </div>

              <div class="tab-pane fade" id="pills-berita">
                <div class="list-group list-group-flush">
                  <div class="list-group-item">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-0">Berita</h5>
                    </div>
                    <small class="mb-0">Kelola berita & kategori</small>
                  </div>
                  <a href="{{ route('admin.news.index') }}" class="list-group-item"><i class="bi bi-file-earmark-text"></i>Semua Berita</a>
                  <a href="{{ route('admin.news.create') }}" class="list-group-item"><i class="bi bi-file-earmark-plus"></i>Tambah Berita</a>
                  <a href="{{ route('admin.categories.index') }}" class="list-group-item"><i class="bi bi-tags"></i>Kategori Berita</a>
                </div>
              </div>

              <div class="tab-pane fade" id="pills-ekskul">
                <div class="list-group list-group-flush">
                  <div class="list-group-item">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-0">Ekstrakurikuler</h5>
                    </div>
                    <small class="mb-0">Kelola daftar ekstrakurikuler</small>
                  </div>
                  <a href="{{ route('admin.extracurriculars.index') }}" class="list-group-item"><i class="bi bi-list-ul"></i>Semua Ekstrakurikuler</a>
                  <a href="{{ route('admin.extracurriculars.create') }}" class="list-group-item"><i class="bi bi-plus-square"></i>Tambah Ekstrakurikuler</a>
                </div>
              </div>

              <div class="tab-pane fade" id="pills-galeri">
                <div class="list-group list-group-flush">
                  <div class="list-group-item">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-0">Galeri</h5>
                    </div>
                    <small class="mb-0">Foto sekolah & foto berita</small>
                  </div>
                  <a href="{{ route('admin.galleries.index') }}" class="list-group-item"><i class="bi bi-images"></i>Semua Foto</a>
                  <a href="{{ route('admin.galleries.create') }}" class="list-group-item"><i class="bi bi-cloud-upload"></i>Tambah Foto</a>
                </div>
              </div>

              <div class="tab-pane fade" id="pills-guru">
                <div class="list-group list-group-flush">
                  <div class="list-group-item">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-0">Data Guru</h5>
                    </div>
                    <small class="mb-0">Kelola data pengajar</small>
                  </div>
                  <a href="{{ route('admin.teachers.index') }}" class="list-group-item"><i class="bi bi-people"></i>Semua Guru</a>
                  <a href="{{ route('admin.teachers.create') }}" class="list-group-item"><i class="bi bi-person-plus"></i>Tambah Guru</a>
                </div>
              </div>

              <div class="tab-pane fade" id="pills-siswa">
                <div class="list-group list-group-flush">
                  <div class="list-group-item">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-0">Data Siswa</h5>
                    </div>
                    <small class="mb-0">Kelola data peserta didik</small>
                  </div>
                  <a href="{{ route('admin.students.index') }}" class="list-group-item"><i class="bi bi-people-fill"></i>Semua Siswa</a>
                  <a href="{{ route('admin.students.create') }}" class="list-group-item"><i class="bi bi-person-plus-fill"></i>Tambah Siswa</a>
                </div>
              </div>

            </div>
          </div>
       </aside>