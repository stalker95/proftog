<?php
use Migrations\AbstractMigration;

class AddColumnNamePlaylistItemInPlaylistsMedia extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up() {
     $table=$this->table('playlists_media');
     $table->addColumn('name','string',['default' => null, 'null' => true]);
     $table->save();
    }

    public function down() {

    }
}
