<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Marcas Controller
 *
 * @property \App\Model\Table\MarcasTable $Marcas
 */
class MarcasController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('marcas', $this->paginate($this->Marcas));
        $this->set('_serialize', ['marcas']);
    }

    /**
     * View method
     *
     * @param string|null $id Marca id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $marca = $this->Marcas->get($id, [
            'contain' => ['Modelos']
        ]);
        $this->set('marca', $marca);
        $this->set('_serialize', ['marca']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $marca = $this->Marcas->newEntity();
        if ($this->request->is('post')) {
            $marca = $this->Marcas->patchEntity($marca, $this->request->data);
            if ($this->Marcas->save($marca)) {
                $this->Flash->success(__('A Marca foi salva.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('A Marca não pôde ser salva. Por favor tente novamente.'));
            }
        }
        $this->set(compact('marca'));
        $this->set('_serialize', ['marca']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Marca id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $marca = $this->Marcas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $marca = $this->Marcas->patchEntity($marca, $this->request->data);
            if ($this->Marcas->save($marca)) {
                $this->Flash->success(__('A Marca foi salva.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('A Marca não pôde ser salva. Por favor tente novamente.'));
            }
        }
        $this->set(compact('marca'));
        $this->set('_serialize', ['marca']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Marca id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $marca = $this->Marcas->get($id);
        if ($this->Marcas->delete($marca)) {
            $this->Flash->success(__('A Marca foi excluída.'));
        } else {
            $this->Flash->error(__('A Marca não pôde ser excluída. Por favor tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
