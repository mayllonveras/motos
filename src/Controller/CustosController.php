<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Custos Controller
 *
 * @property \App\Model\Table\CustosTable $Custos
 */
class CustosController extends AppController
{

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $custo = $this->Custos->newEntity();
        if ($this->request->is('post')) {
            $custo = $this->Custos->patchEntity($custo, $this->request->data);
            if ($this->Custos->save($custo)) {
                $this->Flash->success(__('Custo adicionado.'));
                return $this->redirect(['controller' => 'negocios', 'action' => 'view', $custo['negocio_id']]);
            } else {
                $this->Flash->error(__('The custo could not be saved. Please, try again.'));
            }
        }
        $tipos = $this->Custos->Tipos->find('list', ['limit' => 200]);
        $negocios = $this->Custos->Negocios->find('list', ['limit' => 200]);
        $this->set(compact('custo', 'tipos', 'negocios'));
        $this->set('_serialize', ['custo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Custo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $custo = $this->Custos->get($id);
        if ($this->Custos->delete($custo)) {
            $this->Flash->success(__('Custo excluído.'));
        } else {
            $this->Flash->error(__('The custo could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller' => 'negocios', 'action' => 'view', $custo['negocio_id']]);
    }
}
