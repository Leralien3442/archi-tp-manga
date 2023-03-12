<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Books Controller
 *
 * @property \App\Model\Table\BooksTable $Books
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BooksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Authors', 'Users'],
        ];
        $books = $this->paginate($this->Books);

        $this->set(compact('books'));
    }

    /**
     * View method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel("Borrows");
        $this->loadModel("Readers");
        $book = $this->Books->get($id, [
            'contain' => ['Authors', 'Users', 'Types', 'Borrows'],
        ]);
        $BorrowList = [];
        foreach ($book->borrows as $borrows) {
            $borrow = $this->Borrows->get($borrows->id);
            $reader = $this->Readers->get($borrow->reader_id);
            $borrow['reader'] = $reader;
            array_push($BorrowList, $borrow);
        }
        $book->borrows = $BorrowList;
        $this->set(compact('book'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $book = $this->Books->newEmptyEntity();
        $this->Books->save($book);
        return $this->redirect(['action' => 'edit', $book->id]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Authors');
        $this->loadModel('Types');
        $book = $this->Books->get($id, [
            'contain' => ['Types'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookData = $this->request->getData();
            $bookData->authors->id = $book->authors->id + 1;
            $book = $this->Books->patchEntity($book, $bookData);
            if ($this->Books->save($book)) {
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
        $authors = $this->Authors->find('all', ['fields' => array('Authors.fName', 'Authors.lName')]);
        $authorList = [];
        foreach ($authors as $author) {
            array_push($authorList, $author['lName'] . " " . $author['fName']);
            }
        $authors = $authorList;
        $users = $this->Books->Users->find('list', ['limit' => 200])->all();
        $types = $this->Types->find('all', ['fields' => array('Types.name')]);
        $typesList = [];
        foreach ($types as $type) {
            array_push($typesList, $type['name']);
        }
        $types = $typesList;
        $this->set(compact('book', 'authors', 'users', 'types'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $book = $this->Books->get($id);
        if ($this->Books->delete($book)) {
            $this->Flash->success(__('The book has been deleted.'));
        } else {
            $this->Flash->error(__('The book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function tojson(){
        return $this->response->withType("application/json")->withStringBody(json_encode($this->Books->find("all")));
    }
}
