class CreatePeople < ActiveRecord::Migration
  def change
    create_table :people do |t|
      t.string :name ,:limit => 20
      t.integer :age
      t.string :sex ,:limit => 2

      t.timestamps
    end
  end
end
