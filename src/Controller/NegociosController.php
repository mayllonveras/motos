<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Negocios Controller
 *
 * @property \App\Model\Table\NegociosTable $Negocios
 */
class NegociosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clientes', 'Motos', 'Motos.Modelos'],
            'order' => ['Negocios.data' => 'desc']
        ];
        $this->set('negocios', $this->paginate($this->Negocios));
        $this->set('_serialize', ['negocios']);
    }

    /**
     * View method
     *
     * @param string|null $id Negocio id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $negocio = $this->Negocios->get($id, [
            'contain' => ['Clientes', 'Motos', 'Custos', 'Custos.Tipos', 'Motos.Modelos']
        ]);
        $this->set('negocio', $negocio);
        $this->set('_serialize', ['negocio']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $negocio = $this->Negocios->newEntity();
        if ($this->request->is('post')) {
            $negocio = $this->Negocios->patchEntity($negocio, $this->request->data);
            if ($this->Negocios->save($negocio)) {
                $this->Flash->success(__('O Negócio foi salvo.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O Negócio não pôde ser salvo. Por favor, tente novamente.'));
            }
        }
        $clientes = $this->Negocios->Clientes->find('list', ['limit' => 200]);
        $queryMoto = $this->Negocios->Motos->find()
            ->where(['Motos.id' => $_GET['moto']])
            ->contain(['Modelos']);
        $moto = $queryMoto->toArray();
        $this->set(compact('negocio', 'clientes', 'moto'));
        $this->set('_serialize', ['negocio', 'moto']);

    }

    /**
     * Edit method
     *
     * @param string|null $id Negocio id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $negocio = $this->Negocios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $negocio = $this->Negocios->patchEntity($negocio, $this->request->data);
            if ($this->Negocios->save($negocio)) {
                $this->Flash->success(__('O Negócio foi salvo.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O Negócio não pôde ser salvo. Por favor, tente novamente.'));
            }
        }
        $clientes = $this->Negocios->Clientes->find('list', ['limit' => 200]);
        $motos = $this->Negocios->Motos->find('list', ['limit' => 200]);
        $this->set(compact('negocio', 'clientes', 'motos'));
        $this->set('_serialize', ['negocio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Negocio id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $negocio = $this->Negocios->get($id);
        if ($negocio->tipo == 'venda') {
            if ($this->Negocios->delete($negocio)) {
                    $this->Flash->success(__('O Negócio foi excluído.'));
                } else {
                    $this->Flash->error(__('O Negócio não pôde ser excluído. Por favor, tente novamente.'));
                }
        }else{
        $query = $this->Negocios->find()
                    ->where(['Negocios.moto_id' => $negocio->moto_id, 'Negocios.tipo' => 'venda'])
                    ->all()
                    ->toArray();
            if($query){
                $this->Flash->error(__('Não foi possível excluir este negócio de Compra pois existe um negócio de venda referente à mesma moto.'));
            }else{
                if ($this->Negocios->delete($negocio)) {
                    $this->Flash->success(__('O Negócio foi excluído.'));
                } else {
                    $this->Flash->error(__('O Negócio não pôde ser excluído. Por favor, tente novamente.'));
                }
                
            }
            
        }
       return $this->redirect(['action' => 'index']); 
    }


    public function relatorio(){
        $this->viewBuilder()->layout('relatorio');
        if (isset($this->request->data['Periodo'])) {  
            $di = $this->request->data['Periodo']['inicio'];
            $inicio = $di['year'].'-'.$di['month'].'-'.$di['day'];
            $df = $this->request->data['Periodo']['fim'];
            $fim = $df['year'].'-'.$df['month'].'-'.$df['day'];
            $query = $this->Negocios->find()
                        ->contain(['Clientes', 'Motos', 'Motos.Modelos', 'Custos'])
                        ->order(['Negocios.data'])
                        ->where(function ($exp, $q) use($inicio,$fim) {
                            return $exp->between('data', $inicio, $fim); })
                        ->all();
            $inicio = date_create($inicio);
            $fim = date_create($fim);
            $this->set('negocios', $query);
            $this->set(compact('inicio', 'fim'));

        }
        
    }

    public function relatoriolucros(){
        $this->viewBuilder()->layout('relatorio');
        if (isset($this->request->data['Periodo'])) {  
            $di = $this->request->data['Periodo']['inicio'];
            $inicio = $di['year'].'-'.$di['month'].'-'.$di['day'];
            $df = $this->request->data['Periodo']['fim'];
            $fim = $df['year'].'-'.$df['month'].'-'.$df['day'];
            $negocios = [];
            $queryVenda = $this->Negocios->find()
                        ->contain(['Clientes', 'Motos', 'Motos.Modelos', 'Custos'])
                        ->order(['Negocios.data'])
                        ->where(function ($exp, $q) use($inicio,$fim) {
                            return $exp->between('data', $inicio, $fim); })
                        ->where(['Negocios.tipo' => 'venda'])
                        ->all();
            foreach ($queryVenda as $venda) {
                $queryCompra = $this->Negocios->find()
                        ->contain(['Clientes', 'Motos', 'Motos.Modelos', 'Custos'])
                        ->where(['Negocios.moto_id' => $venda->moto_id, 'tipo' => 'compra'])
                        ->all();
                $negocios = array_merge($negocios, [[$queryCompra->toArray()[0],$venda]]);
            }

            $inicio = date_create($inicio);
            $fim = date_create($fim);
            $this->set(compact('inicio', 'fim', 'negocios'));

        }
        
    }
}
