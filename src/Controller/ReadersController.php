<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Readers Controller
 *
 * @property \App\Model\Table\ReadersTable $Readers
 * @method \App\Model\Entity\Reader[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReadersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $readers = $this->paginate($this->Readers);

        $this->set(compact('readers'));
    }

    /**
     * View method
     *
     * @param string|null $id Reader id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Books');
        $this->loadModel('Borrows');
        $reader = $this->Readers->get($id, [
            'contain' => ['Borrows'],
        ]);
        $BorrowList = [];
        foreach ($reader->borrows as $borrows) {
            $borrow = $this->Borrows->get($borrows->id);
            $book = $this->Books->get($borrow->book_id);
            $borrow['book'] = $book;
            array_push($BorrowList, $borrow);
        }
        $reader->borrows = $BorrowList;
        $this->set(compact('reader'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reader = $this->Readers->newEmptyEntity();
        if ($this->request->is('post')) {
            $reader = $this->Readers->patchEntity($reader, $this->request->getData());
            if ($this->Readers->save($reader)) {
                $this->Flash->success(__('The reader has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reader could not be saved. Please, try again.'));
        }
        $this->set(compact('reader'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reader id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reader = $this->Readers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reader = $this->Readers->patchEntity($reader, $this->request->getData());
            if ($this->Readers->save($reader)) {
                $this->Flash->success(__('The reader has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reader could not be saved. Please, try again.'));
        }
        $this->set(compact('reader'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reader id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reader = $this->Readers->get($id);
        if ($this->Readers->delete($reader)) {
            $this->Flash->success(__('The reader has been deleted.'));
        } else {
            $this->Flash->error(__('The reader could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
