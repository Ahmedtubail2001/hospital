<?php

namespace App\Http\Livewire;

use App\Models\Groups;
use App\Models\Service;
use App\Models\Service_group;
use Livewire\Component;

class CreateGroupServices extends Component
{
    public $GroupsItems = [];
    public $allServices = [];
    public $discount_value = 0;
    public $taxes = 17;
    public $Services_en;
    public $Services_ar;
    public $notes_en;
    public $notes_ar;
    public $ServiceSaved = false;
    public $ServiceUpdated = false;
    public $show_table = true;
    public $updateMode = false;
    public $group_id;

    public function mount()
    {
        $this->allServices = Service::all();
    }

    public function render()
    {

        $total = 0;
        foreach ($this->GroupsItems as $groupItem) {
            if ($groupItem['is_saved'] && $groupItem['service_price'] && $groupItem['quantity']) {
                $total += $groupItem['service_price'] * $groupItem['quantity'];
            }
        }

        return view('livewire.GroupServices.create-group-services', [
            'groups' => Groups::all(),
            'subtotal' => $Total_after_discount = $total - ((is_numeric($this->discount_value) ? $this->discount_value : 0)),
            'total' => $Total_after_discount * (1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100),
        ]);

    }

    public function addService()
    {
        foreach ($this->GroupsItems as $key => $groupItem) {
            if (!$groupItem['is_saved']) {
                $this->addError('GroupsItems.' . $key, 'يجب حفظ هذا الخدمة قبل إنشاء خدمة جديدة.');
                return;
            }
        }

        $this->GroupsItems[] = [
            'service_id' => '',
            'quantity' => 1,
            'is_saved' => false,
            'service_name' => '',
            'service_price' => 0,
        ];

        $this->ServiceSaved = false;
    }

    public function editService($index)
    {
        foreach ($this->GroupsItems as $key => $groupItem) {
            if (!$groupItem['is_saved']) {
                $this->addError('GroupsItems.' . $key, 'This line must be saved before editing another.');
                return;
            }
        }

        $this->GroupsItems[$index]['is_saved'] = false;
    }

    public function saveService($index)
    {
        $this->resetErrorBag();
        $product = $this->allServices->find($this->GroupsItems[$index]['service_id']);
        $this->GroupsItems[$index]['service_name'] = $product->name_en;
        $this->GroupsItems[$index]['service_price'] = $product->price;
        $this->GroupsItems[$index]['is_saved'] = true;
    }

    public function removeService($index)
    {
        unset($this->GroupsItems[$index]);
        $this->GroupsItems = array_values($this->GroupsItems);
    }

    public function saveGroup()
    {
        if ($this->updateMode) {
            $Groups = Groups::find($this->group_id);
            $total = 0;
            foreach ($this->GroupsItems as $groupItem) {
                if ($groupItem['is_saved'] && $groupItem['service_price'] && $groupItem['quantity']) {
                    // الاجمالي قبل الخصم
                    $total += $groupItem['service_price'] * $groupItem['quantity'];
                }
            }
            //الاجمالي قبل الخصم
            $Groups->total_before_discount = $total;
            // قيمة الخصم
            $Groups->discount_value = $this->discount_value;
            // الاجمالي بعد الخصم
            $Groups->total_after_discount = $total - ((is_numeric($this->discount_value) ? $this->discount_value : 0));
            //  نسبة الضريبة
            $Groups->tax_rate = $this->taxes;
            // الاجمالي + الضريبة
            $Groups->total_with_tax = $Groups->total_after_discount * (1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100);
            // حفظ الترجمة
            $Groups->Services_en = $this->Services_en;
            $Groups->Services_ar = $this->Services_ar;
            $Groups->notes_en = $this->notes_en;
            $Groups->notes_ar = $this->notes_ar;

            $Groups->save();
            return redirect()->to('/Add_GroupServices');

            // حفظ العلاقة
            // $Groups->service_group()->detach();
            foreach ($this->GroupsItems as $GroupsItem) {
                Service_group::create(
                    [
                        'Group_id' => $Groups->id,
                        'Service_id' => $GroupsItem['service_id'],
                        'quantity' => $GroupsItem['quantity'],
                    ]
                );
            }

            $this->ServiceSaved = false;
            $this->ServiceUpdated = true;

        } else {

            // insert
            $Groups = new Groups();
            $total = 0;

            foreach ($this->GroupsItems as $groupItem) {
                if ($groupItem['is_saved'] && $groupItem['service_price'] && $groupItem['quantity']) {
                    // الاجمالي قبل الخصم
                    $total += $groupItem['service_price'] * $groupItem['quantity'];
                }
            }

            //الاجمالي قبل الخصم
            $Groups->Total_before_discount = $total;
            // قيمة الخصم
            $Groups->discount_value = $this->discount_value;
            // الاجمالي بعد الخصم
            $Groups->Total_after_discount = $total - ((is_numeric($this->discount_value) ? $this->discount_value : 0));
            //  نسبة الضريبة
            $Groups->tax_rate = $this->taxes;
            // الاجمالي + الضريبة
            $Groups->Total_with_tax = $Groups->Total_after_discount * (1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100);

            $Groups->Services_en = $this->Services_en;
            $Groups->Services_ar = $this->Services_ar;
            $Groups->notes_en = $this->notes_en;
            $Groups->notes_ar = $this->notes_ar;
            $Groups->save();
            return redirect()->to('/Add_GroupServices');

            // حفظ العلاقة
            foreach ($this->GroupsItems as $GroupsItem) {
                Service_group::create(
                    [
                        'Group_id' => $Groups->id,
                        'Service_id' => $GroupsItem['service_id'],
                        'quantity' => $GroupsItem['quantity'],
                    ]
                );
            }
            $this->reset('GroupsItems', 'Services_en', 'Services_ar', 'notes_en', 'notes_en');
            $this->discount_value = 0;
            $this->ServiceSaved = true;

        }

    }

    public function show_form_add()
    {
        $this->show_table = false;
    }

    public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $group = Groups::where('id', $id)->first();
        $this->group_id = $id;

        $this->reset('GroupsItems', 'Services_en', 'Services_ar', 'notes_ar', 'notes_en');
        $this->Services_en = $group->Services_en;
        $this->Services_ar = $group->Services_ar;
        $this->notes_en = $group->notes_en;
        $this->notes_ar = $group->notes_ar;

        $this->discount_value = intval($group->discount_value);
        $this->ServiceSaved = false;

        foreach ($group->service_group as $serviceGroup) {
            $this->GroupsItems[] = [
                'service_id' => $serviceGroup->id,
                'quantity' => $serviceGroup->quantity,
                'is_saved' => true,
                'service_name' => $serviceGroup->name_en,
                'service_price' => $serviceGroup->price,
            ];
        }
    }

    public function delete($id)
    {
        Groups::destroy($id);
        return redirect()->to('/Add_GroupServices');
    }

}