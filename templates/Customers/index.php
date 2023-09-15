<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer[]|\Cake\Collection\CollectionInterface $customers
 */
?>
<?php
$this->assign('title', __('Customers'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Customers'],
]);
?>

<div class="card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title">
            <!-- -->
        </h2>
        <div class="card-toolbox">
            <?= $this->Paginator->limitControl([], null, [
                'label' => false,
                'class' => 'form-control-sm',
            ]); ?>
            <!-- <?= $this->Html->link(__('New Customer'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm', 'data-toggle' => "modal", 'data-target' => "#addModal"]) ?> -->
            <?= $this->Html->link(__('New Customer'), '#', ['class' => 'btn btn-primary btn-sm', 'data-toggle' => 'modal', 'data-target' => '#addModal']) ?>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>
                        <?= $this->Paginator->sort('id') ?>
                    </th>
                    <th>
                        <?= $this->Paginator->sort('name') ?>
                    </th>
                    <th>
                        <?= $this->Paginator->sort('email') ?>
                    </th>
                    <th>
                        <?= $this->Paginator->sort('address') ?>
                    </th>
                    <th>
                        <?= $this->Paginator->sort('created') ?>
                    </th>
                    <th>
                        <?= $this->Paginator->sort('modified') ?>
                    </th>
                    <th class="actions">
                        <?= __('Actions') ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td>
                            <?= $this->Number->format($customer->id) ?>
                        </td>
                        <td>
                            <?= h($customer->name) ?>
                        </td>
                        <td>
                            <?= h($customer->email) ?>
                        </td>
                        <td>
                            <?= h($customer->address) ?>
                        </td>
                        <td>
                            <?= h($customer->created) ?>
                        </td>
                        <td>
                            <?= h($customer->modified) ?>
                        </td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $customer->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>

                            <!-- Add this inside your client list loop -->
                            <button class="btn btn-xs btn-outline-primary edit-client-button" data-toggle="modal"
                                data-target="#editModal" data-client-id="<?= $customer->id ?>"
                                data-client-name="<?= h($customer->name) ?>" data-client-email="<?= h($customer->email) ?>" data-client-address="<?= h($customer->address) ?>"> 
                                Edit
                            </button>


                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['class' => 'btn btn-xs btn-outline-danger', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="card-footer d-md-flex paginator">
        <div class="mr-auto" style="font-size:.8rem">
            <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
        </div>
        <ul class="pagination pagination-sm">
            <?= $this->Paginator->first('<i class="fas fa-angle-double-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->prev('<i class="fas fa-angle-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('<i class="fas fa-angle-right"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->last('<i class="fas fa-angle-double-right"></i>', ['escape' => false]) ?>
        </ul>
    </div>
</div>


<!-- Add Client Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="documentModalLabel">
                    <?= __('Add New Customer') ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= $this->Form->create(null, ['id' => 'addClientForm', 'url' => ['action' => 'add']]) ?>
            <div class="modal-body">
                <div class="form-group">
                    <?= $this->Form->control('name', ['label' => 'Name']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('email', ['label' => 'Email']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('address', ['label' => 'Address']) ?>
                </div>
            </div>
            <div class="modal-footer">
                <?= $this->Form->button(__('Add Client'), ['class' => 'btn btn-primary']) ?>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <?= __('Close') ?>
                </button>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<!-- Edit Client Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="documentModalLabel">
                    <?= __('Edit Customer') ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= $this->Form->create(null, ['id' => 'editClientForm', 'url' => ['action' => 'edit', $customer->id]]) ?>
            <div class="modal-body">
                <div class="form-group">
                    <?= $this->Form->control('name', ['label' => 'Name']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('email', ['label' => 'Email']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('address', ['label' => 'Address']) ?>
                </div>
            </div>
            <div class="modal-footer">
                <?= $this->Form->button(__('Update Client'), ['class' => 'btn btn-primary']) ?>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <?= __('Close') ?>
                </button>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
