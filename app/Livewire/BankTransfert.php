<?php

namespace App\Livewire;

use App\Livewire\Form\TransactionsForm;
use App\Models\Fund as FundModel;
use Livewire\Component;

class BankTransfert extends Component
{
    public $funds;
    public TransactionsForm $form;
    public $feedback = '';

    protected $rules = [
        'form.amount' => 'required|numeric|min:0.01',
        'form.date' => 'required|date',
        'form.deficit_fund_id' => 'required|exists:funds,id|different:form.benefit_fund_id',
        'form.benefit_fund_id' => 'required|exists:funds,id|different:form.deficit_fund_id',
        'form.description' => 'nullable|string|max:255',
    ];
    protected function messages()
    {
        return [
            'form.amount.required' => 'Le montant est requis.',
            'form.amount.numeric' => 'Le montant doit être un nombre.',
            'form.amount.min' => 'Le montant doit être supérieur à 0.01.',
            'form.date.required' => 'La date est requise.',
            'form.date.date' => 'La date n’est pas valide.',
            'form.deficit_fund_id.required' => 'Veuillez sélectionner un fond déficitaire.',
            'form.deficit_fund_id.exists' => 'Le fond déficitaire sélectionné est invalide.',
            'form.deficit_fund_id.different' => 'Le fond déficitaire doit être différent du fond bénéficiaire.',
            'form.benefit_fund_id.required' => 'Veuillez sélectionner un fond bénéficiaire.',
            'form.benefit_fund_id.exists' => 'Le fond bénéficiaire sélectionné est invalide.',
            'form.benefit_fund_id.different' => 'Le fond bénéficiaire doit être différent du fond déficitaire.',
            'form.description.string' => 'La description doit être une chaîne de caractères.',
            'form.description.max' => 'La description ne peut pas dépasser 255 caractères.',
        ];
    }

    public function mount()
    {
        $this->funds = FundModel::get();
    }

    public function save()
    {
        $this->validate();

        $this->form->storeTransfer();

        $this->feedback = 'Transfert enregistré !';
        return $this->redirect('/funds');
    }

    public function render()
    {
        return view('livewire.bank-transfert', [
            'funds' => $this->funds,
        ]);
    }
}

