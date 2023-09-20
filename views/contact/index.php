<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="mt-3">
                <h5 class="mb-3">
                    Listado de contactos
                </h5>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2-mb-3">
                <a href="index.php?m=contact" class="btn btn-primary">
                    <i class="fa-solid fa-user-plus"></i> Agregar contacto
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table project-list-table table-nowrap align-middle table-borderless">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Título</th>
                            <th>Estado</th>
                            <th>Fecha de registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $minvalue = null; $maxvalue = null; ?>
                        <?php foreach ($query as $data) : ?>
                            <?php
                                if(isset($data['id'])){
                                    $id = $data['id'];

                                    if($minvalue === null || $id < $minvalue)
                                    {
                                        $minvalue = $id;
                                    }
                                    if($maxvalue === null || $id > $maxvalue)
                                    {
                                        $maxvalue = $id;
                                    }
                                }
                                ?>
                            <tr>
                                <td><?= $data['id']; ?></td>
                                <td><?= $data['name']; ?></td>
                                <td><?= $data['email']; ?></td>
                                <td><?= $data['phone']; ?></td>
                                <td><?= $data['title']; ?></td>
                                <td><?= $data['status']; ?></td>
                                <td><?= $data['created']; ?></td>
                                <td>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="index.php?m=contact&id<?= $data['id']; ?>" class="px-2 text-primary">
                                                <i class="fa-solid fa-user-pen"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" onClick="showConfirm(<?= $data['id']; ?>)" class="px-2 text-danger">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row g-0 align-items-center-pb-4">
        <div class="col-sm-6">
            <p class="mb-sm-0">Mostrando <?= $minvalue . " de ". $maxvalue ?> de <?= $numContacts; ?> contactos</p>
        </div>

        <div class="col-sm-6">
            <div class="float-sm-end">
                <ul class="pagination mb-sm-0">
                    <?php if($p > 1) : ?>
                    <li class="page-item">
                        <a href="index.php?p=<?= $p - 1?>" class="page-link"><i class="fa-solid fa-angles-left"></i> Anterior</a>
                    </li>
                    <?php endif; ?>
                    <?php if($p * $recordsPerPage < $numContacts) : ?>
                    <li class="page-item">
                        <a href="index.php?p=<?= $p + 1?>" class="page-link">Siguiente <i class="fa-solid fa-angles-right"></i></a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>